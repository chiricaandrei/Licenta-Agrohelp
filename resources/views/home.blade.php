@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<html>
<div class="container">
    <div class="row">
        <div class="col-md-4">
           <div class="crops">My agriculture crops:</div>
        </div>
        <div class="col-md-8 ">
                <button type="button" class="add btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add crops</button>
        </div>
    </div>

    <div class="row">
    <div class="col-md-8">
             <div class="container testimonial-group">
                <div class="row text-center">
                     @foreach($crops as $crop) 
                                  @if($crop->cod_user == Auth::id()) 
                                           <div class="col-xs-4">
                                                 <div class="table-responsive">           
                                                        <table class="table" style="border-bottom-style: none">
                                                                 <thead>
                                                            <tr class="blacktext">
                                                                <th class="col-xs-1"><img src="{{ asset('uploads/leaf.png') }}" style="margin-left:3px; margin-bottom:17px;"></th>
                                                                <th class="col-xs-1"><p  style="text-align:left">{{$crop->denumire}}</p></th>
                                                             </tr>
                                                                 </thead>
                                                              
                                                             <tr class="blacktext">
                                                                <th><img src="{{ asset('uploads/sprout.png') }}" style="margin-left:3px; margin-bottom:17px; margin-top:20px;" ></th> 
                                                                <th class="col-xs-1"><p style="text-align:left; margin-top:20px;">{{$crop->numeseminte}}</p></th>
                                                             </tr>
                                                             
                                                             <tr class="blacktext">
                                                                <th><img src="{{ asset('uploads/shovel.png') }}" style="margin-left:3px; margin-bottom:17px; margin-top:20px;" ></th> 
                                                                <th class="col-xs-1"><p style="text-align:left; margin-top:20px;">{{$crop->total}} kg/ha</p></th>
                                                             </tr>

                                                        </table>
                                                   </div>         
                                            </div>      
                                    @endif
                       @endforeach
              
                     </div>
             </div>
             
    </div>
    </div>

    <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Loan </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="#" method="POST">   
                                     
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="denumire">Name of the crop:</label>
                                    <input type = "denumire" name="denumire"  id="date">
                                    </p>
                                
                                    <p class="al-left">
						            <label for="name">Seed name:</label>
                                    <select name="cod_samanta">
                                       @foreach($seeds as $seed) 
                                        @if($seed->cod_user == Auth::id()) 
                                                <option value="{{$seed->id}}">{{$seed->nume}}</option>   
                                            @endif
                                            @endforeach
                                    </select>
						            </p> 

                                    <p class="al-left">
						            <label for="total">Total (ha):</label>
                                    <input type = "total" name="total"  id="total">
                                    </p> 
                                     <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>

                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
                </div>      
            

    <div class="row">
        <div class="col-md-8">
       <h3>The weather situation on your crops:</h3>
       </div>
    </div>
    
    <div class="row">
    <div class="col-md-12">
                     
                        <div id="map"></div>
                        <script>
                                function initMap() {
                                 var uluru = {lat: 46.435812, lng: 27.639917};
                                 var mapOptions = {
                                            zoom: 17,
                                            center: uluru,
                                             mapTypeId: 'hybrid'
                                                    };
                                 var map = new google.maps.Map(document.getElementById('map'),mapOptions);

                                 var marker = new google.maps.Marker({
                                 position: uluru,
                                 map: map
                                                });       }
                                 
                        </script>
                    <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR0YEEOUbWC8qYTig79dMHfOzXR44wX5w&callback=initMap">
                     </script>  
    </div>
    </div>                
</div>


</html>
@endsection
