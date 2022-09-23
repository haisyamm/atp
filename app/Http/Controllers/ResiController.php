<?php

namespace App\Http\Controllers;

use App\Models\Resi;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hargas'] = [];
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

        // $pdf = PDF::loadview('resi.cetak',['data'=>$data]);
        // return $pdf->download('laporan-pegawai-pdf');
        return view('resi.cetak',$data);
    }
    public function tracking()
    {
        $data['product'] = "ATPXXTUPGR00001";
        return view('resi.lacak', $data);
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
            $an = 'ATP'.$request->payment.substr($request->servis,0,1)."0001";
            $detail['barang'] = $request->detail_barang;
            $detail['tarif'] = $request->detail;
            // dd($detail);
            $alamat_pengirim['alamat_1']= $request->alamat_pengirim_1;
            $alamat_pengirim['alamat_2']= $request->alamat_pengirim_2;

            $alamat_penerima['alamat_1']= $request->alamat_penerima_1;
            $alamat_penerima['alamat_2']= $request->alamat_penerima_2;

            $resi = new Resi;
            $resi->no_resi = $an;
            $resi->tgl_resi = $request->tgl_resi;
            $resi->servis = $request->servis;
            $resi->no_reff = $request->no_reff;
            $resi->pengirim = $request->pengirim;
            $resi->alamat_pengirim = json_encode($alamat_pengirim);
            $resi->tlp_pengirim = $request->tlp_pengirim;
            $resi->penerima = $request->tujuan_area;
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
    public function edit(Resi $resi)
    {
        //
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
