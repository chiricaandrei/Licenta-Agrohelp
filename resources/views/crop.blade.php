@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<html>

<div class="container">
            <div class="row">
                  <div class="col-md-4">
                     <div class="blacktext"><h3>My Fields:</h3></div>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
                  <span class="glyphicon glyphicon-plus-sign"></span> Add Field</button></div>
               
               <div class="modal fade " id="modal1" role="dialog">
			        <div class="modal-dialog modal-lg">
				        <div class="modal-content">
                        
					        <div class="modal-header">
						        <button class="close" data-dismiss="modal">×</button>
						                <h3>Add Field </h3>
					        </div>
					        <div class="modal-body text-right">


                               <form action="#" method="POST">    
                                    
                                    {{csrf_field()}}
						             <p class="al-left">
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="surface">Surface:</label>
                                    <input  type = "number" name="surface" placeholder="0" id="surface">
						            </p>

                                    <p class="al-left">
						            <label for="an">Last year crop::</label>
                                    <input type = "number" name="an" placeholder="0" id="an">
                                    </p>
                                    <p class="al-left">
                                    <label for="an">Use polygon tool to set your Field</label>
                                    </p>

                                    <script>
                                   function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: 46.435812,
      lng: 27.639917
    },
    zoom: 17,
    mapTypeId: 'hybrid'
  });

  var drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.POLYGON,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: ['polygon']
    },
  });
  google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
    var coordStr = "";
    for (var i = 0; i < polygon.getPath().getLength(); i++) {
      coordStr += polygon.getPath().getAt(i).toUrlValue(6) + ";";
    }
    document.getElementById('coords').value = coordStr;
  });
  drawingManager.setMap(map);
  google.maps.event.addDomListener(window, "load", initMap);
};

                                    </script>
                                    <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTPsPJwZSwUIczXVXxerl5FLwKs97Mx8w&libraries=drawing&callback=initMap">
                     </script>  
                     <input id="coords" style="width:600px" />
<div id="map"></div>

                                    
                                    
                                    
                                      

                                    
                                    
						            <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Add">
						            <br><br>
                                  </form>                                      
						    
					        </div>
				        </div>
			        </div>
                </div>      
            </div>
        </div>

</html>
@endsection
 