@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">
<html>
<div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>Here are all of your warehouses</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> new warehouse</button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add warehouse </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('depositController@store') }}" method="POST">    
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="name">Name of the new Warehouse:</label>
                                    <input type = "text" name="name" id="name">
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
                           
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-3">Name</th>
                <th class="col-xs-9">Click on the warehouse image to see what you have there</th>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($deposits as $deposit)
                @if($deposit->cod_user == Auth::id())
                    <tr class="text-success">
                         @php ($j = $deposit->id)
                        <td>{{$deposit->nume}}</td>
                        <td><a href="{{ URL("/resources/deposit/{$j}/edit") }}"><img src="{{ asset('uploads/deposit.png') }}" style="width:240px;height:190px"></td></a>
                        <td><form action="{{ route('deposit.destroy', $deposit->id)}}" method="post">

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