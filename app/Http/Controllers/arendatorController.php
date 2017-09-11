<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\arendator;
use Auth;

class arendatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
        {   $arendators = arendator::all();
            return view("arendator")->with('arendators', $arendators);
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
    { $id = Auth::id();
        

        $arendator=New arendator;
        $arendator->cod_user=$id;
        $arendator->nume=$request->name;
        $arendator->CNP=$request->cnp;
        $arendator->titlu=$request->titlu;
        $arendator->tarla=$request->tarla;
        $arendator->parcela=$request->parcela;
        $arendator->bloc=$request->bloc;
        $arendator->cod_teren=$request->teren;
        $arendator->suprafata=$request->suprafata;
        $arendator->arenda=$request->arenda;
   
        $arendator->save();
    

        $arendators = arendator::all();
    
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
            $arendator=arendator::find($id);
            dd($arendator);
            return $arendator;
        }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $arendator = arendator::find($id);
        return view("arendatoredit")->with('arendator', $arendator);
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
        $arendator =arendator::find($id);

        
        $arendator->cod_user=$ids;
        $arendator->nume=$request->name;
        $arendator->CNP=$request->cnp;
        $arendator->titlu=$request->titlu;
        $arendator->tarla=$request->tarla;
        $arendator->parcela=$request->parcela;
        $arendator->bloc=$request->bloc;
        $arendator->cod_teren=$request->teren;
        $arendator->suprafata=$request->suprafata;
        $arendator->arenda=$request->arenda;
        $arendator->save();
        $arendators = arendator::all();
        return view("arendator")->with('arendators', $arendators);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           arendator::destroy($id);

                $arendators = arendator::all();
        
                return redirect()->back();
    }
}
