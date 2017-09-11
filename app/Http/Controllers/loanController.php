<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loan;
use Auth;

class loanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {  $loans = loan::all();
        return view("loans")->with('loans', $loans);
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
        return view('loans');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $id = Auth::id();
            

        $loan=New loan;
        $loan->cod_user=$id;
        $loan->nume =$request->name;
        $loan->data=$request->date;
        $loan->durata=$request->period;
        $loan->valoare_rata_luna=$request->month;
        $loan->valoare_totala=$request->amount;
        $loan->save();
        

        $loans = loan::all();
        
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
        $loan=loan::find($id);
        dd($loan);
        return $loan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $loan = loan::find($id);
        return view("loansedit")->with('loan', $loan);
        
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
        $loan =loan::find($id);

        
        $loan->cod_user=$ids;
        $loan->nume = $request->name;
        $loan->data=$request->date;
        $loan->durata=$request->period;
        $loan->valoare_rata_luna=$request->month;
        $loan->valoare_totala=$request->amount;
        $loan->save();
        $loans = loan::all();
        return view("loans")->with('loans', $loans);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        loan::destroy($id);

        $loans = loan::all();

        return redirect()->back();
    }
}
