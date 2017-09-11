<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use Auth;
use Image; 

class EmployeController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {  $employees = Employe::all();
         return view("employees")->with('employees', $employees);
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
     {   ob_start();
         $id = Auth::id();
        
         $employee=New Employe;
         $filename='11111.png';
         $employee->buletin=$filename;
         $employee->cod_user=$id;
         $employee->nume =$request->nume;
         $employee->prenume=$request->prenume;
         $employee->CNP=$request->cnp;
         $employee->salariu=$request->salariu;
         $employee->save();
         $employees= Employe::all();
         
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
            $employee=Employe::find($id);
            dd($employee);
            return $employee;
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {  
         $employee = Employe::find($id);
         return view("employeesedit")->with('employee', $employee);
         
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
        $employee=Employe::find($id);

        $buletin=$request->file('buletin');
        $filename = time().'.'.$buletin->getClientOriginalExtension();
        Image::make($buletin)->resize(300,300)->save(public_path('/uploads/buletine/'.$filename)); 

        $employee->buletin=$filename;
        $employee->cod_user=$ids;
        $employee->nume =$request->nume;
        $employee->prenume=$request->prenume;
        $employee->CNP=$request->cnp;
        $employee->salariu=$request->salariu;
        $employee->save();

        $employees= Employe::all();
        
        return view("employees")->with('employees', $employees);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         Employe::destroy($id);
 
         $employees= Employe::all();
 
         return redirect()->back();
     }
}
