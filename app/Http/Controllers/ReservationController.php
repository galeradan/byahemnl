<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Type;
use App\Make;
use Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        $models = Type::all();
        $models_cart = [];
        return view('reservation.reservation',compact('categories','models','models_cart'));
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


        $categories = Category::all();
        $models = Type::all();
        $days = $request->days;
        $startDate = $request->setStartDate;
        $endDate = $request->setEndDate;
        $category;
        $models_cart = $request->models;
        $totals = 0;

        foreach ($models_cart as $model_id => $quantity) {
                # code...
               $model = Type::find($model_id);
               
               // declare a quantity propert on our $model for later use
               $model->quantity = $quantity;
               // declare a subtotal propert for later use
               $model->subtotal = $quantity * $model->rates * $days;
               // increment/add the total
               $totals += $model->subtotal;

               // dd($product);
               // now that we have the product detals, let's "push" the $product to our $product_cart

               $models_cart[$model_id] = $model; //This code is equivalent to $product_array.array_push($product)
               $request->session()->put('session_cart', $models_cart);

            }

        return view('reservation.reservation', compact('categories','models','startDate','endDate','days','models_cart','totals'));
        // return response()->json($models_cart);

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

        $models = Category::find($id)->models()->get();
        $categories = Category::all();
        $makes = Make::all();
        $models_cart = [];
        // dd($models);
        return view('reservation.reservation',compact('models','makes','categories','models_cart'));

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
        //
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
