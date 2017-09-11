@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                <form enctype="multipart/form-data" action="{{action('EmployeController@update',$employee->id) }}" method="POST"> 
                                    {!! method_field('patch') !!}     
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="nume">Name:</label>
                                    <input type = "text" name="nume" placeholder="name" value="{{$employee->nume}}"  id="nume">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="prenume">Surname:</label>
                                    <input  type = "text" name="prenume" placeholder="surname" value="{{$employee->prenume}}" id="prenume">
						            </p>  

                                    <p class="al-left">
						            <label for="cnp">CNP:</label>
                                    <input  type = "text" name="cnp" id="cnp" value="{{$employee->CNP}}">
						            </p>    

                                    <p class="al-left">
						            <label for="salariu">Salary:</label>
                                    <input type = "number" name="salariu" id="salariu" value="{{$employee->salariu}}">
                                    </p>

                                    <p class="al-left">
						            <label for="buletin">Identity Card:</label>
                                    <input type = "file" name="buletin" id="buletin" value="111111" required>
                                    </p>
                                    
                                    
						            <input type="submit" class="btn btn-sm btn-warning glyphicon glyphicon-pencil" name="submit" value="Edit">
						            <br><br>
                 </form>   

            </div>
        </div>
    </html>                                
    @endsection