<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Service;
use App\Models\Why;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $about = About::all();
        $service = Service::all();
        $why = Why::all();
        return view('home')->with([
            'about' => $about,
            'service' => $service,
            'why' => $why,
        ]);
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
        if($request->company_icon1){

            $company_icon1 = $request->file('company_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $company_icon1->getClientOriginalExtension();

            $company_icon1->move($tujuan,$namaFile);

            $data['company_icon1'] = $namaFile;
        }

        if($request->company_icon2){

            $company_icon2 = $request->file('company_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '.' . $company_icon2->getClientOriginalExtension();

            $company_icon2->move($tujuan,$namaFile);

            $data['company_icon2'] = $namaFile;
        }
        About::create($data);
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
        if($request->company_icon1){

            $company_icon1 = $request->file('company_icon1');
            $tujuan = 'cover';
            $namaFile =  time() . '1' . '.' . $company_icon1->getClientOriginalExtension();

            $company_icon1->move($tujuan,$namaFile);

            $data['company_icon1'] = $namaFile;
        }

        if($request->company_icon2){

            $company_icon2 = $request->file('company_icon2');
            $tujuan = 'cover';
            $namaFile =  time() . '.' . $company_icon2->getClientOriginalExtension();

            $company_icon2->move($tujuan,$namaFile);

            $data['company_icon2'] = $namaFile;
        }
        $item = About::findOrFail($id);
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
    
    public function adminHome()
    {
        return view('adminHome');
    }
}
