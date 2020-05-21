<?php

namespace App\Http\Controllers;

use App\Request;
use App\Type;
use App\Asset;
use App\Rental;
use Illuminate\Http\Request as HttpRequest;
use Session;
use Auth;
class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        //  
        $assets = []; 
        $requests = Request::where('approval_id',1)->get();
        return view('request.manage_request',compact('requests','assets'));
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
        //get days
         $days = $request->days;
         $id = Auth::user()->id;

         // Save the request
         $newRequest = new Request();
         $newRequest->request_code = "DG".time();
         $newRequest->user_id = $id;
         $newRequest->start_date = $request->setStartDate;
         $newRequest->end_date = $request->setEndDate;
         $newRequest->total_rates = $request->total;
         $newRequest->approval_id = 1;
         $newRequest->save();

         // create records on pivot
         foreach ($request->session()->get('session_cart') as $id => $model) {
             # code...
             // on creating records on our pivot table, we use the attach (). And for the delete , we use detach() method
             $newRequest->types()->attach($id,["quantity" => $model->quantity]);

         }
        
         Session::forget('session_cart');

         return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
         $assets = [];
         // $models = Request::find($id)->types()->get();
         // foreach ($models as $model) {
         //     # code...
         //    $fleet = Type::find($model->id)->assets()->get();

         //    $assets[$model->model] = $fleet;
         // }

         $models = Request::find($id)->types()->get();
         $requests = Request::find($id);
         foreach ($models as $model) {
             # code...
            $fleet = Type::find($model->id)->assets()->WhereDoesntHave('rentals.request', function ($query) use ($requests) {
               $query->whereDate('start_date','<',$requests->start_date)
                     ->WhereDate('end_date','>',$requests->start_date)
                     ->orWhereDate('start_date','>=',$requests->end_date)
                     ->WhereDate('start_date','<=',$requests->end_date)
                     ->orWhereDate('end_date','>=',$requests->start_date)
                     ->WhereDate('end_date','<=',$requests->start_date);;
                     // ->whereDate('end_date','>',$requests->start_date)
                     // ->orWhereDate('start_date','<',$requests->end_date);
               // dd($requests->start_date);
           })->where('phase_id',3)->get();

            $assets[$model->model] = $fleet;
         }

         // Kunin mo yung assets na may requests
            // Na may existing start date <= dun sa new request na startdate
            // at may existing end date >= dun sa request na start date
         // o kaya kunin mo yung assets na walang requests
         // at nasa phase 3 which is Rental

         $requests = Request::all();
         return view('request.manage_request',compact('requests','assets'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(HttpRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $request, $id)
    {
        //

        $updateRequest = Request::find($request->id);
        $updateRequest->approval_id = $request->approval_id;
        $updateRequest->save();
        // $assets = []; 
        // $requests = Request::where('approval_id',1)->get();
        // return view('request.manage_request',compact('requests','assets'));

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(HttpRequest $request)
    {
        //
    }
}
