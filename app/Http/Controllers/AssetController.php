<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Type;
use App\Phase;
use App\Garage;
use Illuminate\Http\Request;

class AssetController extends Controller
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
                $assets = Asset::orderBy('vin', $request->filterValue)->get();
        }
        else{
                $assets = Asset::orderBy('vin', 'asc')->get();

        }

        // $models = Type::all();
        $models = Type::all();
        $garages = Garage::all();
       
        $phases = Phase::all();
        return view('acquisition.fleet',compact('assets','models','garages','phases'));

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
        $newAsset = new Asset();
        
        $newAsset->model_id = $request->model;
        $newAsset->vin = $request->vin;
        $newAsset->plate_no = $request->plate;
        $newAsset->garage_id = $request->garage;
        $newAsset->phase_id = $request->phase;
        $newAsset->staff_id = 1;
        $newAsset->save();

        return response()->json($newAsset);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
        $newAsset = Asset::find($request->itemID);
        $newAsset->model_id = $request->model;
        $newAsset->vin = $request->vin;
        $newAsset->plate_no = $request->plate;
        $newAsset->garage_id = $request->garage;
        $newAsset->phase_id = $request->phase;
        $newAsset->staff_id = 1;
        $newAsset->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Asset $asset)
    {
        //
        Asset::find($request->itemID)->delete();
        return response()->json();
    }
}
