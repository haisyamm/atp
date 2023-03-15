<?php

namespace App\Http\Controllers;

use App\Models\RequestPickup;
use App\Models\Contact;
use Illuminate\Http\Request;

class RequestPickupController extends Controller
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
        $contact = Contact::all();
        return view('request', ['contact' => $contact]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'image'=>'required|image'
        // ]);
        
        try{
            $rp = new RequestPickup;
            $rp->no_resi = $request->no_resi;
            $rp->alamat_pengirim = $request->alamat_pengirim;
            $rp->no_hp = $request->no_hp;
            $rp->save();

            return response()->json([
                'message'=>'Request Created Successfully!!'
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
     * @param  \App\Models\RequestPickup  $requestPickup
     * @return \Illuminate\Http\Response
     */
    public function show(RequestPickup $requestPickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestPickup  $requestPickup
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestPickup $requestPickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestPickup  $requestPickup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestPickup $requestPickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestPickup  $requestPickup
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestPickup $requestPickup)
    {
        //
    }
}
