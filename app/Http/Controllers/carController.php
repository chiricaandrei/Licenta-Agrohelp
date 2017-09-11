<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\car;
use Auth;

class carController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cars = car::all();
        return view("cars")->with('cars', $cars);
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
    public function viewLoanForm()
    {
        return view('cars');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $id = Auth::id();
            

        $car=New car;
        $car->cod_user=$id;
        $car->nume =$request->name;
        $car->tip=$request->tip;
        $car->ore_folosite=$request->ore;
       
        $car->save();
        

        $cars = car::all();
        
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
        $car=car::find($id);
        dd($car);
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $car = car::find($id);
        return view("carsedit")->with('car', $car);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $ids = Auth::id();
        $car=car::find($id);

        
        $car->cod_user=$id;
        $car->nume =$request->name;
        $car->tip=$request->tip;
        $car->ore_folosite=$request->ore;
        $car->save();
        $cars = car::all();
        return view("cars")->with('cars', $cars);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        car::destroy($id);

        $cars = car::all();

        return redirect()->back();
    }
}
