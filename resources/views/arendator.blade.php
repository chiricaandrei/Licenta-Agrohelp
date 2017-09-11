@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>My Lessors:</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add </button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Lessors </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('arendatorController@store') }}" method="POST">    
                                   
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="teren">Field number:</label>
                                    <input  type = "text" name="teren" id="teren">
						            </p>    

                                    <p class="al-left">
						            <label for="cnp">CNP:</label>
                                    <input type = "number" name="cnp" id="cnp">
                                    </p>

                                      <p class="al-left">
						            <label for="titlu">Property title:</label>
                                    <input  type = "text" name="titlu" id="titlu">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="tarla">Zone no:</label>
                                    <input  type = "text" name="tarla" id="tarla">
						            </p>    

                                    <p class="al-left">
						            <label for="parcela">Parcela:</label>
                                    <input  type = "text" name="parcela" id="parcela">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="bloc">Physical block:</label>
                                    <input  type = "text" name="bloc" id="bloc">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="arenda">Lease:</label>
                                    <input  type = "text" name="arenda" id="arenda">
						            </p> 

                                      <p class="al-left">
						            <label for="suprafata">Surface(ha):</label>
                                    <input  type = "number" step="0.01" name="suprafata" id="suprafata">
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
                <p>Here are all of your arendators</p>            
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-1">Name</th>
                <th class="col-xs-2">CNP</th>
                <th class="col-xs-1">Property Title</th>
                <th class="col-xs-1">Zone no</th></th>
                <th class="col-xs-1">Parcel</th>
                <th class="col-xs-1">Physical block</th>
                <th class="col-xs-1">Surface(ha)</th>
                <th class="col-xs-1">lease</th>
                <th class="col-cs-1">Real lease</th>
                <th class="col-xs-1">CAS</th>
                <th class="col-xs-1">Tax</th>
                <th class="col-xs-1"></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($arendators as $arendator)
                @if($arendator->cod_user == Auth::id())
                    <tr class="text-success">
                         @php($arendareala=($arendator->arenda-((0.75*$arendator->arenda)*0.215))*$arendator->suprafata)
                         @php($cas=((0.75*($arendator->arenda*$arendator->suprafata)*0.055)))
                         @php($tax=((0.75*($arendator->arenda*$arendator->suprafata)*0.16)))
                         @php ($j = $arendator->id)
                        <td>{{$i++}}</td>
                        <td>{{$arendator->nume}}</td>
                        <td>{{$arendator->CNP}}</td>
                        <td>{{$arendator->titlu}}</td>
                        <td>{{$arendator->tarla}}</td>
                        <td>{{$arendator->parcela}}</td>
                        <td>{{$arendator->bloc}}</td>
                        <td>{{$arendator->suprafata}}</td>
                        <td>{{$arendator->arenda*$arendator->suprafata}}</td>
                        <td>{{$arendareala}}</td>
                        <td>{{$cas}}</td>
                        <td>{{$tax}}</td>
                        <td><a href="{{ URL("/resources/lessors/{$j}/edit") }}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"> Edit</a></td>
                        
                
                        
                        <td><form action="{{ route('lessors.destroy', $arendator->id)}}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE" >
                            <input type="submit"  value="Delete" name="Delete" id="btnExc" class="btn btn-sm btn-danger glyphicon glyphicon-trash" accesskey="x">
                            </form></td>
                        
                    </tr>
                    <tfoot>
                    <tr class="blacktext">

                    
                    </tr>
                    </tfoot>
                @endif
                @endforeach
                </tbody>
              </table>
              </div>
          

            

        
        </div>

</html>

@endsection