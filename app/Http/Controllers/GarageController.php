<?php

namespace App\Http\Controllers;

use App\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
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
                $garages = Garage::orderBy('name', $request->filterValue)->get();
        }
        else{
                $garages = Garage::orderBy('name', 'asc')->get();

        }

        // $garages = Make::all();
       
        return view('acquisition.garage', compact('garages'));

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
        $newGarage = new Garage();
        $newGarage->name = $request->name;
        $newGarage->city = $request->city;
        $newGarage->address = $request->address;
        $newGarage->save();

        return response()->json($newGarage); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function show(Garage $garage)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function edit(Garage $garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garage $garage)
    {
        //
        $updateGarage = Garage::find($garage->id);
        $updateGarage->name = $request->newName;
        $updateGarage->city = $request->newCity;
        $updateGarage->address = $request->newAddress;
        $updateGarage->save();
        $alert = ["message"=>"dito kana".$updateGarage];

        return response()->json($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garage $garage)
    {
        //
        Garage::find($garage->id)->delete();
        return response()->json();
    }
}
