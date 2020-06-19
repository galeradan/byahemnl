<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Request;
use Auth;
use Illuminate\Http\Request as HttpRequest;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $rentals = Rental::where('status_id',2)->get();
        $ongoingRentals = Rental::where('status_id',1)->get();

        return view('rental.manage_rental',compact('rentals','ongoingRentals'));
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
    public function store(HttpRequest $request)
    {
        //

        $id = Auth::user()->id;
        $newRental = new Rental();
        $newRental->request_id = $request->id;
        $newRental->status_id = 2;
        $newRental->staff_id = $id;
        $newRental->save();


        $updateRequest = Request::find($request->id);
        $updateRequest->approval_id = 2;
        $updateRequest->save();


        $models = $request->models;

        foreach ($models as $id => $model_id) {
             # code...
             // on creating records on our pivot table, we use the attach (). And for the delete , we use detach() method
             $newRental->assets()->attach($id);
         }

         return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $request, Rental $rental)
    {
        //

        $updateRental = Rental::find($request->id);
        $updateRental->status_id = $request->status_id;
        $updateRental->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
