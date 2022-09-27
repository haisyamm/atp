<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Why;

class WhyController extends Controller
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
        if($request->why_icon1){

            $why_icon1 = $request->file('why_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $why_icon1->getClientOriginalExtension();

            $why_icon1->move($tujuan,$namaFile);

            $data['why_icon1'] = $namaFile;
        }

        if($request->why_icon2){

            $why_icon2 = $request->file('why_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '2' . '.' . $why_icon2->getClientOriginalExtension();

            $why_icon2->move($tujuan,$namaFile);

            $data['why_icon2'] = $namaFile;
        }

        if($request->why_icon3){

            $why_icon3 = $request->file('why_icon3');
            $tujuan = 'cover';
            $namaFile =  time() . '3' . '.' . $why_icon3->getClientOriginalExtension();

            $why_icon3->move($tujuan,$namaFile);

            $data['why_icon3'] = $namaFile;
        }

        if($request->why_icon4){

            $why_icon4 = $request->file('why_icon4');
            $tujuan = 'cover';
            $namaFile =  time() . '4' . '.' . $why_icon4->getClientOriginalExtension();

            $why_icon4->move($tujuan,$namaFile);

            $data['why_icon4'] = $namaFile;
        }

        Why::create($data);
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
        if($request->why_icon1){

            $why_icon1 = $request->file('why_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $why_icon1->getClientOriginalExtension();

            $why_icon1->move($tujuan,$namaFile);

            $data['why_icon1'] = $namaFile;
        }

        if($request->why_icon2){

            $why_icon2 = $request->file('why_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '2' . '.' . $why_icon2->getClientOriginalExtension();

            $why_icon2->move($tujuan,$namaFile);

            $data['why_icon2'] = $namaFile;
        }

        if($request->why_icon3){

            $why_icon3 = $request->file('why_icon3');
            $tujuan = 'cover';
            $namaFile =  time() . '3' . '.' . $why_icon3->getClientOriginalExtension();

            $why_icon3->move($tujuan,$namaFile);

            $data['why_icon3'] = $namaFile;
        }

        if($request->why_icon4){

            $why_icon4 = $request->file('why_icon4');
            $tujuan = 'cover';
            $namaFile =  time() . '4' . '.' . $why_icon4->getClientOriginalExtension();

            $why_icon4->move($tujuan,$namaFile);

            $data['why_icon4'] = $namaFile;
        }

        $item = Why::findOrFail($id);
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
