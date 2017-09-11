<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seed;
use App\crop;
use Auth;

class homeController extends Controller
{     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $seeds=seed::All();
        $crops=crop::All();

        $data = array(
            'seeds'  => $seeds,
            'crops'   => $crops
        );
        
        return view('home')->with($data);
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
        $id = Auth::id();
        
    $sed=seed::find($request->cod_samanta);

    $crop=New crop;
    $crop->cod_user=$id;
    $crop->denumire =$request->denumire;
    $crop->cod_seminta=$request->cod_samanta;
    $crop->numeseminte=$sed->nume;
    $crop->total=$request->total;
 
    $crop->save();
    

    $crops = crop::all();
    
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


