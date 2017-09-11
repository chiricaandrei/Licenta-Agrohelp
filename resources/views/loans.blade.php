@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>My Loans:</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Loan</button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Loan </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('loanController@store') }}" method="POST">    
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="date">Date:</label>
                                    <input type = "date" name="date" placeholder="Date" id="date">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" placeholder="Ex:Tractor" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="period">Period(months):</label>
                                    <input  type = "number" name="period" placeholder="0" id="period">
						            </p>    

                                    <p class="al-left">
						            <label for="month">Month Rate(euro):</label>
                                    <input type = "number" name="month" placeholder="0" id="month">
                                    </p>

                                    <p class="al-left">
						            <label for="amount">Amount:</label>
                                    <input type = "number" name="amount" placeholder="0" id="amount">
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
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Name</th>
                <th class="col-xs-3">Start Date</th>
                <th class="col-xs-1">Period</th>
                <th class="col-xs-1">Month Rate</th>
                <th class="col-xs-1">Total loan</th>
                <th class="col-xs-1"></th>
                <th class="col-xs-1"></th>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($loans as $loan)
                @if($loan->cod_user == Auth::id())
                    <tr class="text-success">
                         @php ($j = $loan->id)
                        <td>{{$i++}}</td>
                        <td>{{$loan->nume}}</td>
                        <td>{{$loan->data}}</td>
                        <td>{{$loan->durata}}</td>
                        <td>{{$loan->valoare_rata_luna}}</td>
                        <td>{{$loan->valoare_totala}}</td>
                        <td><a href="{{ URL("/finance/loans/{$j}/edit") }}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"> Edit</a></td>
                        
                
                        
                        <td><form action="{{ route('loans.destroy', $loan->id)}}" method="post">

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