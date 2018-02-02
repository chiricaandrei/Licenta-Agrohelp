@extends('layouts.app')

@section('content')

<link href="{{ asset('css/loans.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/weather-icons-wind.css') }}" rel="stylesheet">
<link href="{{ asset('css/weather-icons.css') }}" rel="stylesheet">
<link href="{{ asset('css/weather-icons.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/weather-icons-wind.min.css') }}" rel="stylesheet">
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
        <div class="col-md-12">
       <h3>The weather situation on your crops: </h3>
       <div class='wrapper'>
            
              <search>
                <form>
                  <div class="col-md-9" style="padding-left: 0px;">  
                  <input class='searchbar' id='search' type='text' placeholder='enter city, country' />
                  </div>
                  <div class="col-md-3" style="padding-right: 0px;">
                  <input class='button' id='button' type="submit" value='GO' />
                  </div>
                </form>
              </search>
            
              <div class='panel'>
                <h2 class='city vreme'  id='city'></h2>
                <div class='weather vreme' id='weather'>
                        <div class='weather' id='weather'>
                  <div class='group secondary'>
                    <h3 id='dt' class='vreme'></h3>
                    <h3 id='description' class='vreme'></h3>
                  </div>
                  <div class='group secondary'>
                    <h3 id='wind' class='vreme'></h3>
                    <h3 id='humidity' class='vreme'></h3>
                  </div>
                  <div class='temperature' id='temperature'>
                    <h1 class='temp vreme'  id='temp'><i id='condition'></i> <span id='num'></span><a class='fahrenheit active' id='fahrenheit' href="#">&deg;F</a><span class='divider secondary'>|</span><a class='celsius' id='celsius' href="#">&deg;C</a></h1>
                  </div>
                  <div class='forecast vreme' id='forecast'></div>
                </div>
              </div>
           
           <div class="result"></div>
       <h3><p id="demo"></p></h3>


       </div>
       <script>

           function titleCase(str) {
            return str.split(' ').map(function (word) {
              return word[0].toUpperCase() + word.substring(1);
            }).join(' ');
          }
          
          function fullDay(str) {
            switch (str) {
              case 'Tue':
                return 'Tuesday';
              case 'Wed':
                return 'Wednesday';
              case 'Thu':
                return 'Thursday';
              case 'Sat':
                return 'Saturday';
              default:
                return str + 'day';
            }
          }
          
          $(function() {
            
            var $wrapper = $('.wrapper'),
              $panel = $wrapper.find('.panel'),
              $city = $panel.find('#city'),
              $weather = $panel.find('.weather'),
              $group = $panel.find('.group'),
              $dt = $group.find('#dt'),
              $description = $group.find('#description'),
              $wind = $group.find('#wind'),
              $humidity = $group.find('#humidity'),
              $temperature = $weather.find('#temperature'),
              $temp = $temperature.find('#temp'),
              $icon = $temp.find('#condition'),
              $tempNumber = $temp.find('#num'),
              $celsius = $temp.find('#celsius'),
              $fahrenheit = $temp.find('#fahrenheit'),
              $forecast = $weather.find('#forecast'),
              $search = $wrapper.find('search'),
              $form = $search.find('form'),
              $button = $form.find('#button');
          
            $.ajax({
                dataType: 'json',
                url: '//ipapi.co/8.8.8.8/json/'
              })
              .then(function(data) {
                var yourLocation = data.city + ',' + data.postal + ',' + data.country;
                getWeather(yourLocation);
              });
          
            function getWeather(input) {
          
              var appid = '7af5e6368f223fadcc99c5d23871171c';
              var requestWeather = $.ajax({
                dataType: 'json',
                url: '//api.openweathermap.org/data/2.5/weather',
                data: {
                  q: input,
                  units: 'imperial',
                  appid: appid
                }
              });
              var requestForecast = $.ajax({
                dataType: 'json',
                url: '//api.openweathermap.org/data/2.5/forecast',
                data: {
                  q: input,
                  units: 'imperial',
                  cnt: '6',
                  appid: appid
                }
              });
          
              $fahrenheit.addClass('active').removeAttr('href');
              $celsius.removeClass('active').attr("href", '#');
              $icon.removeClass();
            
          
              requestWeather.done(function(data) {
          
                var weather = document.getElementById('weather');
                if (data.cod === '404') {
                  $city.html('city not found');
                  setBackground('color404', 'button404');
                  weather.style.display = 'none';
                } else weather.style.display = '';
          
                var dt = new Date(data.dt * 1000).toString().split(' ');
          
                var title = data.sys.country
                  ? data.name + ', ' + data.sys.country
                  : data.name;
          
                $city.html(title);
                $tempNumber.html(Math.round(data.main.temp));
                $description.html(titleCase(data.weather[0].description));
                $wind.html('Wind: ' + data.wind.speed + ' mph');
                $humidity.html('Humidity ' + data.main.humidity + '%');
                $dt.html(fullDay(dt[0]) + ' ' + dt[4].substring(0, 5));
          
                $celsius.on('click', toCelsius);
                $fahrenheit.on('click', toFahrenheit);
          
                function toCelsius() {
                  $(this).addClass('active').removeAttr('href');
                  $fahrenheit.removeClass('active').attr('href', '#');
                  $tempNumber.html(Math.round((data.main.temp - 32) * (5 / 9)));
                }
          
                function toFahrenheit() {
                  $(this).addClass('active').removeAttr('href');
                  $celsius.removeClass('active').attr("href", '#');
                  $tempNumber.html(Math.round(data.main.temp));
                }
          
                function setBackground(background, button) {
                  $('body').removeClass().addClass(background);
                  $button.off().hover(function() {
                    $(this).removeClass('transparent').addClass(button);
                  }, function() {
                    $(this).removeClass().addClass('button transparent');
                  });
                }
          
               
          
                switch (data.weather[0].icon) {
                  case '01d':
                    $icon.addClass('wi wi-day-sunny');
                    break;
                  case '02d':
                    $icon.addClass('wi wi-day-sunny-overcast');
                    break;
                  case '01n':
                    $icon.addClass('wi wi-night-clear');
                    break;
                  case '02n':
                    $icon.addClass('wi wi-night-partly-cloudy');
                    break;
                case '03d':
                    $icon.addClass('wi wi-cloud');
                    break;
                  case '04d':
                    $icon.addClass('wi wi-cloudy');
                    break;
                  case '09d':
                    $icon.addClass('wi wi-showers');
                    break;
                  case '10d':
                    $icon.addClass('wi wi-rain');
                    break;
                  case '11d':
                    $icon.addClass('wi wi-thunderstorm');
                    break;
                  case '13d':
                    $icon.addClass('wi wi-snow');
                    break;
                  case '50d':
                    $icon.addClass('wi wi-fog');
                    break;
                case '03n':
                    $icon.addClass('wi wi-cloud');
                    break;
                  case '04n':
                    $icon.addClass('wi wi-cloudy');
                    break;
                  case '09n':
                    $icon.addClass('wi wi-showers');
                    break;
                  case '10n':
                    $icon.addClass('wi wi-rain');
                    break;
                  case '11n':
                    $icon.addClass('wi wi-thunderstorm');
                    break;
                  case '13n':
                    $icon.addClass('wi wi-snow');
                    break;
                  case '50n':
                    $icon.addClass('wi wi-fog');
                    break;
                }
          
              });
          
              requestForecast.done(function(data) {
          
                $celsius.on('click', toCelsius);
                $fahrenheit.on('click', toFahrenheit);
          
                var forecast = [];
                var length = data.list.length;
                for (var i = 1; i < length; i++) {
                  forecast.push({
                    date: new Date(data.list[i].dt * 1000).toString().split(' ')[0],
                    fahrenheit: {
                      high: Math.round(data.list[i].main.temp_max),
                      low: Math.round(data.list[i].main.temp_min),
                    },
                    celsius: {
                      high: Math.round((data.list[i].main.temp_max - 32) * (5 / 9)),
                      low: Math.round((data.list[i].main.temp_min - 32) * (5 / 9))
                    }
                  });
                }
          
                function toCelsius() {
                  doForecast('celsius');
                }
          
                function toFahrenheit() {
                  doForecast('fahrenheit');
                }
          
                function doForecast(unit) {
                  var arr = [];
                  var length = forecast.length;
                  for (var i = 0; i < length; i++) {
                    arr[i] = ("<div class='block'><h3 class='secondary'>" + forecast[i].date + "</h3><h2 class='high'>" + forecast[i][unit].high + "</h2><h4 class='secondary'>" + forecast[i][unit].low + "</h4></div>");
                  }
                  $forecast.html(arr.join(''));
                }
          
                doForecast('fahrenheit');
              });
            }
          
            $form.submit(function(event) {
              var input = document.getElementById('search').value;
              var inputLength = input.length;
              if (inputLength) getWeather(input);
              event.preventDefault();
            });
          
          });
           

          
       </script>
    </div>
    </div>
    </div>
    
    <div class="row text-center">
    <div class="col-md-12">
                     
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
      
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'hybrid'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>
                     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTPsPJwZSwUIczXVXxerl5FLwKs97Mx8w&libraries=places&callback=initAutocomplete"
                     async defer></script>
                     
    </div>
    </div>                
</div>


</html>
@endsection
