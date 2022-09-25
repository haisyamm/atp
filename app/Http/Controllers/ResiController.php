<?php

namespace App\Http\Controllers;

use App\Models\Resi;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use PDF;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resi.create');
    }

    public function print()
    {
        
        $data['product'] = "ATPXXTUPGR00001";
        $data['qrcode'] =  QrCode::size(70)->generate("ATPXXTUPGR00001");

        $pdf = PDF::loadview('resi.resiPdf',$data);
        return $pdf->stream();
        // return view('resi.resiPdf',$data);
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

    public function updateTracking(Request $request)
    {
        try
        {
            $resi = Resi::find($request->id);
            //$today = Carbon::now();
            $tracking['status'] = $request->status;
            $tracking['word'] = $request->word;
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
            $an = 'ATP'.$request->payment.substr($request->servis,0,1).str_pad($new, 5, '0', STR_PAD_LEFT);
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
            $resi->total_berat = $request->total_berat;
            $resi->total_biaya = $request->total_biaya;
            $resi->detail_barang = json_encode($detail);


            $resi->saveOrFail();

            return response()->json([
                'status' => 'Success ditambahkan',
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
     * Display the specified resource.
     *
     * @param  \App\Models\Resi  $resi
     * @return \Illuminate\Http\Response
     */
    public function show(Resi $resi)
    {
        //
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
