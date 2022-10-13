<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.list')->with([
            'pelanggan' => $pelanggan
        ]);
    }

    public function searchPelanggan(Request $request)
    {
        $result = [];

        if($request->has('term')){
            $query = Pelanggan::where('nama', 'like', '%'. $request->term .'%')->get();
            foreach(json_decode($query->take(5)) as $key => $val){
                $result[$key]['id'] = $val->id;
                $result[$key]['nama'] = $val->nama;
                $result[$key]['no_tlp'] = $val->no_tlp;
                $result[$key]['alamat'] = json_decode($val->alamat);
            }
        }
        
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = explode(":", $request->alamat);
        $alamat['id']= $add[0];
        $alamat['alamat_1']= $add[1];
        $alamat['alamat_2']= $request->alamat2;

        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => json_encode($alamat),
            'no_tlp' => $request->no_tlp,
        ]);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Pelanggan::findOrFail($id)->first();
        //dd($data);
        $data['add'] = json_decode($data->alamat);
        return view('pelanggan.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $add = explode(":", $request->alamat);
        $alamat['id']= $add[0];
        $alamat['alamat_1']= $add[1];
        $alamat['alamat_2']= $request->alamat2;
        $data = $request->all();
        $item = Pelanggan::findOrFail($id);
        $item->update([
            'nama' => $request->nama,
            'alamat' => json_encode($alamat),
            'no_tlp' => $request->no_tlp,
        ]);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pelanggan::findOrFail($id);
        $item->delete();
        return redirect()->route('pelanggan.index');
    }
}
