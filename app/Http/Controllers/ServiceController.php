<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->service_icon1){

            $service_icon1 = $request->file('service_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $service_icon1->getClientOriginalExtension();

            $service_icon1->move($tujuan,$namaFile);

            $data['service_icon1'] = $namaFile;
        }

        if($request->service_icon2){

            $service_icon2 = $request->file('service_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '2' . '.' . $service_icon2->getClientOriginalExtension();

            $service_icon2->move($tujuan,$namaFile);

            $data['service_icon2'] = $namaFile;
        }

        if($request->service_icon3){

            $service_icon3 = $request->file('service_icon3');
            $tujuan = 'cover';
            $namaFile =  time() . '3' . '.' . $service_icon3->getClientOriginalExtension();

            $service_icon3->move($tujuan,$namaFile);

            $data['service_icon3'] = $namaFile;
        }

        Service::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->service_icon1){

            $service_icon1 = $request->file('service_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $service_icon1->getClientOriginalExtension();

            $service_icon1->move($tujuan,$namaFile);

            $data['service_icon1'] = $namaFile;
        }

        if($request->service_icon2){

            $service_icon2 = $request->file('service_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '2' . '.' . $service_icon2->getClientOriginalExtension();

            $service_icon2->move($tujuan,$namaFile);

            $data['service_icon2'] = $namaFile;
        }

        if($request->service_icon3){

            $service_icon3 = $request->file('service_icon3');
            $tujuan = 'cover';
            $namaFile =  time() . '3' . '.' . $service_icon3->getClientOriginalExtension();

            $service_icon3->move($tujuan,$namaFile);

            $data['service_icon3'] = $namaFile;
        }

        $item = Service::findOrFail($id);
        $item->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
