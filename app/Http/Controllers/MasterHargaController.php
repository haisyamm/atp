<?php

namespace App\Http\Controllers;

use App\Models\MasterHarga;
use Illuminate\Http\Request;

class MasterHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hargas'] = MasterHarga::all();
        return view('harga.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harga.create');
    }

    public function searchProvince(Request $request)
    {
        $result = [];

        if($request->has('q')){
            $search = $request->q;
            $result = \Indonesia::search($search)->allProvinces();
        }
        
        return  json_encode($result);
    }

    public function searchCity(Request $request)
    {
        $result = [];

        if($request->has('q')){
            $search = $request->q;
            $result = \Indonesia::search($search)->allCities();
        }
        
        return  json_encode($result);
    }

    public function searchKecamatan(Request $request)
    {
        $result = [];

        if($request->has('q')){
            $search = $request->q;
            $result = \Indonesia::search($search)->allDistricts();
        }
        
        return json_encode($result);
    }

    public function searchKelurahan(Request $request)
    {
        $result = [];
        $convert = [];

        if($request->has('q')){
            $search = $request->q;
            $cari = \Indonesia::search($search)->allVillages();
            foreach($cari->take(15) as $val){
                $result = \Indonesia::findVillage($val->id, ['province', 'city', 'district']);
                $convert[$val->id]['id'] = $result->id;
                $convert[$val->id]['name'] = $result->province->name.", ".$result->city->name.", ".$result->district->name.", ".$result->name;
            }
        }
        return json_encode($convert);
    }

    public function searchHarga(Request $request)
    {
        $result = [];

        if($request->has('q')){
            $search = $request->q;
            $result = MasterHarga::where('alamat_asal', 'like', '%'. $search .'%')->get();
        }
        return json_encode($result);
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
            $mh = new MasterHarga;
            $mh->alamat_asal = $request->alamat_asal;
            $mh->kelurahan_asal = $request->kelurahan_asal;
            $mh->alamat_tujuan = $request->alamat_tujuan;
            $mh->kelurahan_tujuan = $request->kelurahan_tujuan;
            $mh->harga = $request->harga;
            $mh->estimasi = $request->estimasi;
            $mh->servis = $request->servis;
            $mh->saveOrFail();

            return response()->json([
                'status' => 'Success ditambahkan',
                'data' => $mh,
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=> $e->getMessage()
            ],500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterHarga  $masterHarga
     * @return \Illuminate\Http\Response
     */

    public function tarif(Request $request)
    {
        $data['tarif'] = MasterHarga::where('kelurahan_asal', $request->kelurahan_asal )->where('kelurahan_tujuan', $request->kelurahan_tujuan)->get();
        $data['berat'] = $request->berat;
        return view('tarif', $data);
    }

    public function show(MasterHarga $masterHarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterHarga  $masterHarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $harga = MasterHarga::find($request->id);
        return view('harga.create', compact('harga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterHarga  $masterHarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterHarga $masterHarga)
    {
        try{
        
            $masterHarga->update([
                'alamat_asal' => $request->alamat_asal,
                'kelurahan_asal' => $request->kelurahan_asal,
                'alamat_tujuan' => $request->alamat_tujuan,
                'kelurahan_tujuan' => $request->kelurahan_tujuan,
                'harga' => $request->harga,
                'estimasi' => $request->estimasi,
                'servis' => $request->servis,
            ]);

            return response()->json([
                'status' => 'Success update',
                'data' => $masterHarga,
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=> $e->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterHarga  $masterHarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterHarga $masterHarga, Request $request)
    {
        $masterHarga = MasterHarga::find($request->id);
        $masterHarga->delete();

        //redirect to index
        return redirect()->route('master-harga');
    }
}
