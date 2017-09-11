@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
               <div class="col-sm-3"><button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Fuel</button></div>

                <div class="col-sm-3"><button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modal2">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Chemicals</button></div>

                <div class="col-sm-3"><button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#modal3">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Fertilizers</button></div>

                <div class="col-sm-3"><button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modal4">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Seeds</button></div>
               
               
               
              <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Fuels</h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('depositeditController@store',$deposit->id) }}" method="POST">   
                                    <input type = "hidden" name="cod_dep" value="{{$deposit->id}}" id="cod_Dep"> 
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="tip">Type:</label>
                                    <input type = "text" name="tip" id="tip">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="pret">Price:</label>
                                    <input  type = "number" step="0.01" name="pret" id="pret">
						            </p>  

                                    <p class="al-left">
						            <label for="firma">Brand:</label>
                                    <input  type = "text" name="firma" id="firma">
						            </p>    

                                    <p class="al-left">
						            <label for="cantitate">Amount (L):</label>
                                    <input type = "number" name="cantitate" id="cantitate">
                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
             </div>      
            

                 <div class="modal fade " id="modal2" role="dialog">
			         <div class="modal-dialog modal-lg">
				           <div class="modal-content">
                        
					          <div class="modal-header">
						          <button class="close" data-dismiss="modal">×</button>
						               <h3>Add Chemicals</h3>
					         </div>
					         <div class="modal-body text-right">
                                 <form action="{{action('depositeditController@store2',$deposit->id) }}" method="POST">   
                                    <input type = "hidden" name="cod_dep" value="{{$deposit->id}}" id="cod_Dep"> 
                                    
                                    {{csrf_field()}}
                                    <p class="al-left">
						            <label for="nume">Nume:</label>
                                    <input  type = "text"  name="nume" id="nume">
						            </p>  

                                    <p class="al-left">
						            <label for="pret">Price:</label>
                                    <input  type = "number" step="0.01" name="pretan" id="pret">
						            </p>  

                                    <p class="al-left">
						            <label for="firma">Brand:</label>
                                    <input  type = "text" name="firma" id="firma">
						            </p>    

                                    <p class="al-left">
						            <label for="cantitate">Amount (Kg):</label>
                                    <input type = "number" name="cantitate" id="cantitate">
                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						      </div>
				         </div>
			         </div>
                 </div>     
            </div> 

            <div class="modal fade " id="modal3" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Fuels</h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('depositeditController@store4',$deposit->id) }}" method="POST">   
                                    <input type = "hidden" name="cod_dep" value="{{$deposit->id}}" id="cod_Dep"> 
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="nume">Nume:</label>
                                    <input type = "text" name="nume" id="nume">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="pret">Price:</label>
                                    <input  type = "number" step="0.01" name="pret" id="pret">
						            </p>  

                                    <p class="al-left">
						            <label for="firma">Brand:</label>
                                    <input  type = "text" name="firma" id="firma">
						            </p>    

                                    <p class="al-left">
						            <label for="cantitate">Amount (KG):</label>
                                    <input type = "number" name="cantitate" id="cantitate">
                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
        </div>      

         <div class="modal fade " id="modal4" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Seeds</h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="{{action('depositeditController@store5',$deposit->id) }}" method="POST">   
                                    <input type = "hidden" name="cod_dep" value="{{$deposit->id}}" id="cod_Dep"> 
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="nume">Name:</label>
                                    <input type = "text" name="nume" id="nume">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="pret">Price:</label>
                                    <input  type = "number" step="0.01" name="pret" id="pret">
						            </p>

                                    <p class="al-left">
						            <label for="cantitate">Amount (kg):</label>
                                    <input type = "number" name="cantitate" id="cantitate">
                                    </p>

                                    <p class="al-left">
						            <label for="cantitate_ha">KG/HA:</label>
                                    <input type = "number" name="cantitate_ha" id="cantitate_ha">
                                    </p>
                                    
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
             </div>      
            

         
         
         <div class="row">
             <div class="table-responsive">
               <h3>Here are all of your fuels:</h3>          
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Fuel</th>
                <th class="col-xs-2">Price</th>
                <th class="col-xs-2">Amount(L)</th>
                <th class="col-xs-3">Brand</th>
                <th class="col-xs-1"></th>
                
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($fuels as $fuel)
                @if($fuel->cod_depozit == $deposit->id)
                    <tr class="text-success">
                         @php ($j = $fuel->id)
                        <td>{{$i++}}</td>
                        <td>{{$fuel->tip}}</td>
                        <td>{{$fuel->pret}}</td>
                        <td>{{$fuel->cantitate}}</td>
                        <td>{{$fuel->firma}}</td>
                        
                        
                
                        
                        <td><form action="{{ route('edit.destroy',[$fuel->id,$deposit->id])}}" method="post"> 
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
        <div class="row">
         <div class="table-responsive">
               <h3>Here are all of your chemical substances:</h3>          
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Namw</th>
                <th class="col-xs-2">Price</th>
                <th class="col-xs-2">Amount(L)</th>
                <th class="col-xs-3">Brand</th>
                <th class="col-xs-1"></th>
                
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($substances as $substance)
                @if($substance->cod_depozit == $deposit->id)
                    <tr class="text-success">
                         @php ($j = $substance->id)
                        <td>{{$i++}}</td>
                        <td>{{$substance->nume}}</td>
                        <td>{{$substance->pret}}</td>
                        <td>{{$substance->cantitate}}</td>
                        <td>{{$substance->firma}}</td>
                        
                        
                        <td><form action="#" method="post">   
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

        <div class="row">
         <div class="table-responsive">
               <h3>Here are all of your Fertilizers:</h3>          
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Name</th>
                <th class="col-xs-2">Price</th>
                <th class="col-xs-2">Amount(L)</th>
                <th class="col-xs-3">Brand</th>
                <th class="col-xs-1"></th>
                
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($ingrasamants as $ingrasamant)
                @if($ingrasamant->cod_depozit == $deposit->id)
                    <tr class="text-success">
                         @php ($j = $ingrasamant->id)
                        <td>{{$i++}}</td>
                        <td>{{$ingrasamant->nume}}</td>
                        <td>{{$ingrasamant->pret}}</td>
                        <td>{{$ingrasamant->cantitate}}</td>
                        <td>{{$ingrasamant->firma}}</td>
                        
                        
                        <td><form action="#" method="post">   
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

    <div class="row">
         <div class="table-responsive">
               <h3>Here are all of your Seeds:</h3>          
              <table class="table table-striped">
                <thead>
                <tr class="blacktext">
                <th class="col-xs-1">Nr</th>
                <th class="col-xs-3">Name</th>
                <th class="col-xs-2">Price</th>
                <th class="col-xs-2">Amount(kg)</th>
                <th class="col-xs-3">KG/HA</th>
                <th class="col-xs-1"></th>
                
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach($seeds as $seed)
                @if($seed->cod_depozit == $deposit->id)
                    <tr class="text-success">
                         @php ($j = $seed->id)
                        <td>{{$i++}}</td>
                        <td>{{$seed->nume}}</td>
                        <td>{{$seed->pret}}</td>
                        <td>{{$seed->cantitate}}</td>
                        <td>{{$seed->cantitate_ha}}</td>
                        
                        
                        <td><form action="#" method="post">   
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




 </div>
             
    </div>
    </html>                                
    @endsection