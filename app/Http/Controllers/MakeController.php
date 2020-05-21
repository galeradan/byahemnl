<?php

namespace App\Http\Controllers;

use App\Make;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //


        if(isset($request->filterValue)){
                $makes = Make::orderBy('brand', $request->filterValue)->get();
        }
        else{
                $makes = Make::orderBy('brand', 'asc')->get();

        }
        // $makes = Make::all();
        return view('acquisition.make', compact('makes'));
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
        //

        $newMake = new Make();
        $newMake->brand = $request->brand;
        $newMake->contact = $request->contact;
        $newMake->dealer = $request->dealer;
        $newMake->save();

        return response()->json($newMake); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function show(Make $make)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit(Make $make)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Make $make)
    {
        $updateMake = Make::find($make->id);
        $updateMake->brand = $request->newBrand;
        $updateMake->contact = $request->newContact;
        $updateMake->dealer = $request->newDealer;
        $updateMake->save();
        $alert = ["message"=>"dito kana".$updateMake];

        return response()->json($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy(Make $make)
    {
        //

        // dd('here na you');
        // $alert = ["message"=>"dito kana"];
        Make::find($make->id)->delete();
        return response()->json();
    
    }
}
