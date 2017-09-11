@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>Your Employees:</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Employees</button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Employees </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('EmployeController@store') }}" method="POST">    
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="nume">Name:</label>
                                    <input type = "text" name="nume" placeholder="name" id="nume">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="prenume">Surname:</label>
                                    <input  type = "text" name="prenume" placeholder="surname" id="prenume">
						            </p>  

                                    <p class="al-left">
						            <label for="cnp">CNP:</label>
                                    <input  type = "text" name="cnp" id="cnp">
						            </p>    

                                    <p class="al-left">
						            <label for="salariu">Salary:</label>
                                    <input type = "number" name="salariu" id="salariu">
                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
                </div>      
            </div>

<div class="table-responsive">
                <p>Here are all of your Employees</p>            
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-2">Name</th>
                <th class="col-xs-2">Surname</th>
                <th class="col-xs-2">CNP</th>
                <th class="col-xs-2">Salary</th>
                <th class="col-xs-2">Identity card</th>
                <th class="col-xs-1"></th>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($employees as $employee)
                @if($employee->cod_user == Auth::id())
                    <tr class="text-success">
                         @php ($j = $employee->id)
                        <td>{{$i++}}</td>
                        <td>{{$employee->nume}}</td>
                        <td>{{$employee->prenume}}</td>
                        <td>{{$employee->CNP}}</td>
                        <td>{{$employee->salariu}}</td>
                        <td><a href="{{ asset('uploads/buletine') }}/{{ $employee->buletin }}" ><img src="{{ asset('uploads/buletine') }}/{{ $employee->buletin }}" style="width:82px; height:41px"></a></td>
                        <td><a href="{{ URL("/resources/employees/{$j}/edit") }}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"> Edit</a></td>  
                        
                
                        
                        <td><form action="{{ route('employees.destroy', $employee->id)}}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE" >
                            <input type="submit"  value="Delete" name="Delete" id="btnExc" class="btn btn-sm btn-danger glyphicon glyphicon-trash" accesskey="x">
                            </form></td>
                        
                    </tr>
                @endif
                @endforeach
                </tbody>
              </table>
              </div>
          


        </div>
    </html>    
@endsection