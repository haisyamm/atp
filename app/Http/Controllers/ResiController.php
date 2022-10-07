<?php

namespace App\Http\Controllers;

use App\Models\Resi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use PDF;
use DB;

class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resi = Resi::all();
        $data['resi'] = json_decode($resi);

        return view('resi.list', $data);
    }

    public function dBooking()
    {
        $db = DB::table('dBooking')->first();
        //$data = json_encode($db);

        return json_encode($db);
    }

    public function lastBooking()
    {
        $resi = Resi::orderBy('id', 'desc')->take(10)->get();
        foreach($resi as $key => $val){
            $track = json_decode($val->tracking);
            $data[$key]['no_resi'] =$val->no_resi;
            $data[$key]['status'] =$track[count($track)-1]->status;
        }
        return json_encode($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resi.create');
    }

    public function print(Request $request)
    {
        $resi = Resi::find($request->id);
        $area = auth()->user()->area;
        $o_id = auth()->user()->o_id;
        $penerima= json_decode($resi->alamat_penerima);
        $url = route('track-stt', 'no_resi='.$resi->no_resi);
        //dd($resi);
        $cek_area = DB::table('cek_area')->where('asal_id', auth()->user()->origin_id)->where('tujuan_id', $penerima->id)->first();
        $data['area'] = $cek_area;
        foreach(json_decode($cek_area->estimasi) as $key => $est){
            $data['estimasi'][$key] = $est; 
        }
        $detail = json_decode($resi->detail_barang);
        $data['qrcode'] =  QrCode::size(70)->generate($url);
        $data['product'] = $resi->no_resi;
        $data['alamat_pengirim'] = json_decode($resi->alamat_pengirim);
        $data['alamat_penerima']=  $penerima;
        $data['resi'] = json_decode($resi);
        $data['detail_barang'] = $detail->barang;
        $data['detail_biaya'] = $detail->tarif[0];
        // dd($data);
        // $pdf = PDF::loadview('resi.resiPdf',$data);
        // return $pdf->stream();
        return view('resi.cetak',$data);
    }

    public function tracking(Request $request)
    {
        $resi = Resi::where('no_resi', $request->no_resi)->first();
        // dd($resi[0]->tracking);
        $tracking = isset($resi->tracking) ? json_decode($resi->tracking) : '';
        $data['resi'] =json_decode($resi);
        $data['last'] =count(json_decode($resi->tracking))-1;
        $data['tracking'] = $tracking;
        return view('resi.lacak', $data);
    }

    public function trackSTT(Request $request)
    {
        try
        {
        $resi = Resi::where('no_resi', $request->no_resi)->first();
        // dd($resi[0]->tracking);
        $tracking = isset($resi->tracking) ? json_decode($resi->tracking) : '';
        $data['resi'] =json_decode($resi);
        $data['last'] =count(json_decode($resi->tracking))-1;
        $data['tracking'] = $tracking;
        return view('lacak', $data);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->with([
                'message'=> $e->getMessage()
            ],500);
        }
    }

    public function updateTracking(Request $request)
    {
        try
        {
            $resi = Resi::find($request->id);
            //$today = Carbon::now();
            $word = explode(">", $request->word);
            $tracking['status'] = $request->status;
            $tracking['word'] = $word[1];
            $tracking['date'] = Carbon::now()->format('Y-m-d');
            $tracking['time'] = Carbon::now()->format('H:i');
            
            $history = json_decode($resi->tracking);
            $data = $history;
            $data[] = $tracking;
            // dd(json_encode($data));

            $resi->tracking = json_encode($data);
            $resi->saveOrFail();

            return response()->json([
                'status' => 'Update Success',
                'data' => $resi,
            ]);

        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->with([
                'message'=> $e->getMessage()
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $resi = Resi::all();
            $last = count(json_decode($resi));
            $new = $last+1;
            $area = auth()->user()->area;
            $an = 'ATP-'.$area.$request->payment.substr($request->servis,0,1).str_pad($new, 6, '0', STR_PAD_LEFT);
            // dd($an);
            $detail['barang'] = $request->detail_barang;
            $detail['tarif'] = $request->detail;
            // dd($detail);
            $alamat_pengirim['id']= $request->asal_id;
            $alamat_pengirim['alamat_1']= $request->alamat_pengirim_1;
            $alamat_pengirim['alamat_2']= $request->alamat_pengirim_2;

            $alamat_penerima['id']= $request->tujuan_id;
            $alamat_penerima['alamat_1']= $request->alamat_penerima_1;
            $alamat_penerima['alamat_2']= $request->alamat_penerima_2;
            // dd($request->is_do);
            if($request->simpan_pengirim){
                Pelanggan::create([
                    'nama' => $request->nama_pengirim,
                    'alamat' => json_encode($alamat_pengirim),
                    'no_tlp' => $request->tlp_pengirim,
                ]);
            }

            if($request->simpan_penerima){
                Pelanggan::create([
                    'nama' => $request->nama_penerima,
                    'alamat' => json_encode($alamat_penerima),
                    'no_tlp' => $request->tlp_penerima,
                ]);
            }
            
            $tracking['status'] = "PICK UP";
            $tracking['word'] = config('tracking')['PICK UP'];
            $tracking['date'] = Carbon::now()->format('Y-m-d');
            $tracking['time'] = Carbon::now()->format('H:i');
            $track[] = $tracking;
            $resi = new Resi;
            $resi->no_resi = $an;
            $resi->tgl_resi = $request->tgl_resi;
            $resi->servis = $request->servis;
            $resi->no_reff = $request->no_reff;
            $resi->pengirim = $request->nama_pengirim;
            $resi->alamat_pengirim = json_encode($alamat_pengirim);
            $resi->tlp_pengirim = $request->tlp_pengirim;
            $resi->penerima = $request->nama_penerima;
            $resi->alamat_penerima = json_encode($alamat_penerima);
            $resi->tlp_penerima = $request->tlp_penerima;
            $resi->payment = $request->payment;
            $resi->packing = $request->packing;
            $resi->others = $request->others;
            $resi->is_do = ($request->is_do == true) ? 1 : 0 ;
            $resi->total_berat = $request->total_berat;
            $resi->total_biaya = $request->total_biaya;
            $resi->detail_barang = json_encode($detail);
            $resi->tracking = json_encode($track);
            
            // dd($detail);
            $resi->saveOrFail();

            return response()->json([
                'status' => 'Success ditambahkan',
                'data' => $resi,
            ]);

        }catch(\Exception $e){
            \Log::error($e->getMessage());
            dd($e);
            return response()->with([
                'message'=> $e->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resi  $resi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $resi = Resi::find($request->id);
        $detail = json_decode($resi->detail_barang);
        $data['alamat_pengirim'] = json_decode($resi->alamat_pengirim);
        $data['alamat_penerima']= json_decode($resi->alamat_penerima);
        $data['resi'] = json_decode($resi);
        $data['detail_barang'] = $detail->barang;
        $data['detail_biaya'] = $detail->tarif[0];
        return view('resi.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resi  $resi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $resi = Resi::find($request->id);
        $detail = json_decode($resi->detail_barang);
        $data['resi'] = json_decode($resi);
        $data['detail_barang'] = $detail->barang;
        $data['detail_biaya'] = $detail->tarif[0];
        return view('resi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resi  $resi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resi $resi)
    {
        //
        $detail['barang'] = $request->detail_barang;
        $detail['tarif'] = $request->detail;
        // dd($request->detail_barang);
        // dd($detail);
        $alamat_pengirim['id']= $request->asal_id;
        $alamat_pengirim['alamat_1']= $request->alamat_pengirim_1;
        $alamat_pengirim['alamat_2']= $request->alamat_pengirim_2;

        $alamat_penerima['id']= $request->tujuan_id;
        $alamat_penerima['alamat_1']= $request->alamat_penerima_1;
        $alamat_penerima['alamat_2']= $request->alamat_penerima_2;

        $resi = Resi::find($request->id);
        $resi->tgl_resi = $request->tgl_resi;
        $resi->servis = $request->servis;
        $resi->no_reff = $request->no_reff;
        $resi->pengirim = $request->nama_pengirim;
        $resi->alamat_pengirim = json_encode($alamat_pengirim);
        $resi->tlp_pengirim = $request->tlp_pengirim;
        $resi->penerima = $request->nama_penerima;
        $resi->alamat_penerima = json_encode($alamat_penerima);
        $resi->tlp_penerima = $request->tlp_penerima;
        $resi->payment = $request->payment;
        $resi->packing = $request->packing;
        $resi->others = $request->others;
        $resi->total_berat = $request->total_berat;
        $resi->total_biaya = $request->total_biaya;
        $resi->detail_barang = json_encode($detail);


        $resi->saveOrFail();

        return response()->json([
            'status' => 'Update Success',
            'data' => $resi,
        ]);

    }

    public function cancel(Request $request)
    {
        try
        {
            $resi = Resi::find($request->id);
            //$today = Carbon::now();
            $tracking['status'] = "CANCELED";
            $tracking['word'] = $request->word;
            $tracking['date'] = Carbon::now()->format('Y-m-d');
            $tracking['time'] = Carbon::now()->format('H:i');
            
            $history = json_decode($resi->tracking);
            $data = $history;
            $data[] = $tracking;
            $resi->cancel = json_encode($tracking);
            $resi->tracking = json_encode($data);
            // dd($resi);
            $resi->saveOrFail();
            return redirect()->route('resi');
        
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->with([
                'message'=> $e->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resi  $resi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resi $resi)
    {
        //
    }
}
