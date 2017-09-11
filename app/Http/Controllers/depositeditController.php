<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deposit;
use App\fuel;
use App\substance;
use App\ingrasamant;
use App\seed;
use Auth;

class depositeditController extends Controller
{ public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposit = deposit::find($id);
        $fuels=fuel::all();
        $substances=substance::all();
        $data = array(
           'deposit'  => $deposit,
           'fuels'   => $fuels,
           'substances'=> $substances
       );
       

        return view("depositedit")->with($data);
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
     {  $fuel=New fuel;
        $fuel->cod_depozit=$request->cod_dep;
        $fuel->tip =$request->tip;
        $fuel->pret=$request->pret;
        $fuel->cantitate=$request->cantitate;
        $fuel->firma=$request->firma;
         
         $fuel->save();
         
 
         $fuels = fuel::all();
         
         return redirect()->back();
     }

     public function store2(Request $request)
     {  $substance=New substance;
        $substance->cod_depozit=$request->cod_dep;
        
        $substance->nume=$request->nume;
        $substance->pret=$request->pretan;
        $substance->cantitate=$request->cantitate;
        $substance->firma=$request->firma;
         
         $substance->save();
         
 
         $substances = substance::all();
         
         return redirect()->back();
     }
     public function store4(Request $request)
     { 
        $ingrasamant=New ingrasamant;
        $ingrasamant->cod_depozit=$request->cod_dep;
        
        $ingrasamant->nume=$request->nume;
        $ingrasamant->pret=$request->pret;
        $ingrasamant->cantitate=$request->cantitate;
        $ingrasamant->firma=$request->firma;
         
         $ingrasamant->save();
         
 
         $ingrasamants = ingrasamant::all();
         
         return redirect()->back();
     }
     
     public function store5(Request $request)
     { $ids=Auth::id();
        $seed=New seed;
        $seed->cod_depozit=$request->cod_dep;
        
        $seed->nume=$request->nume;
        $seed->cod_user=$ids;
        $seed->pret=$request->pret;
        $seed->cantitate=$request->cantitate;
        $seed->cantitate_ha=$request->cantitate_ha;
         
         $seed->save();
         
 
         $seeds = seed::all();
         
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
         $fuels=fuel::find($id);
         dd($fuels);
         return $fuels;
     }

     public function show2($id)
     {
         $substances=substance::find($id);
         dd($substances);
         return $substances;
     }

     public function show3($id)
     {
         $ingrasamants=ingrasamant::find($id);
         dd($ingrasamants);
         return $ingrasamants;
     }
     public function show4($id)
     {
         $seeds=seed::find($id);
         dd($seeds);
         return $seeds;
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
         fuel::destroy($id);
 
         $fuels= fuel::all();

         return redirect()->back();

     }
  
}