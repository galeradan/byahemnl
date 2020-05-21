<?php

namespace App\Http\Controllers;

use App\Type;
use App\Make;
use App\Category;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //
        // dd($request->filterValue);
        if(isset($request->filterValue)){
                $models = Type::orderBy('model', $request->filterValue)->get();
        }
        else{
                $models = Type::orderBy('model', 'asc')->get();

        }

        // $models = Type::all();
        $makes = Make::all();
        $categories = Category::all();
        return view('acquisition.model_rates',compact('models','makes','categories'));
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

        $newModel = new Type();
        $newModel->make_id = $request->brand;
        $newModel->category_id = $request->category;
        $newModel->model = $request->name;
        $newModel->year = $request->year;  
        $newModel->trim = $request->trim;
        $newModel->body = $request->body; 
        $newModel->rates = $request->rate;
        $newModel->save();

        return response()->json($newModel); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //

        $updateModel = Type::find($request->itemID);
        $updateModel->make_id = $request->brand;
        $updateModel->category_id = $request->category;
        $updateModel->model = $request->name;
        $updateModel->year = $request->year;  
        $updateModel->trim = $request->trim;
        $updateModel->body = $request->body; 
        $updateModel->rates = $request->rate;
        $updateModel->save();
        // $alert = ["message"=>"dito kana".$request->itemID];

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Type $type)
    {
        //

        Type::find($request->itemID)->delete();
        return response()->json();
    }
}
