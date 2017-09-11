<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deposit;
use App\fuel;
use App\substance;
use App\ingrasamant;
use App\seed;
use Auth;


class depositController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {  $deposits = deposit::all();
         return view("deposit")->with('deposits', $deposits);
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
     {   $id = Auth::id();
             
 
         $deposit=New deposit;
         $deposit->cod_user=$id;
         $deposit->nume =$request->name;
         
         $deposit->save();
         
 
         $deposits = deposit::all();
         
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
            $deposit=deposit::find($id);
            dd($deposit);
            return $deposit;
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {  
         $deposit = deposit::find($id);
         $fuels=fuel::all();
         $substances=substance::all();
         $ingrasamants=ingrasamant::all();
         $seeds=seed::all();
         $data = array(
            'deposit'  => $deposit,
            'fuels'   => $fuels,
            'substances'=> $substances,
            'ingrasamants'=> $ingrasamants,
            'seeds'=>$seeds
            

        );
        

         return view("depositedit")->with($data);
         
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
