@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>My Machines:</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Machines</button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Machines </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('carController@store') }}" method="POST">    
                                   
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="tip">Type:</label>
                                    <input  type = "text" name="tip" id="tip">
						            </p>    

                                    <p class="al-left">
						            <label for="ore">Usage Hours:</label>
                                    <input type = "number" name="ore" id="ore">
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
                <p>Here are all of your cars</p>            
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Name</th>
                <th class="col-xs-3">Type</th>
                <th class="col-xs-1">Hours Usage</th>
                <th class="col-xs-1"></th>
                <th class="col-xs-1"></th>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($cars as $car)
                @if($car->cod_user == Auth::id())
                    <tr class="text-success">
                         @php ($j = $car->id)
                        <td>{{$i++}}</td>
                        <td>{{$car->nume}}</td>
                        <td>{{$car->tip}}</td>
                        <td>{{$car->ore_folosite}}</td>
                        <td><a href="{{ URL("/resources/machines/{$j}/edit") }}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"> Edit</a></td>
                        
                
                        
                        <td><form action="{{ route('machines.destroy', $car->id)}}" method="post">

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