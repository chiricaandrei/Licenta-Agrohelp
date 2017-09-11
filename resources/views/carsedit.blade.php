@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                <form action="{{action('carController@update', $car->id) }}" method="post">
                               {!! method_field('patch') !!}    
                                    <p class="al-left">
                                    {{csrf_field()}}
                                    <label for="name">Name:</label>
                                    <input  type = "text" name="name" value="{{$car->nume}}" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="tip">Type:</label>
                                    <input  type = "text" name="tip" value="{{$car->tip}}" id="tip">
						            </p>    

                                    <p class="al-left">
						            <label for="ore">Usage Hours:</label>
                                    <input type = "number" name="ore" value="{{$car->ore_folosite}}" id="ore">
                                    </p>

                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-warning glyphicon glyphicon-pencil" name="submit" value="Edit">
						            <br><br>
                                  </form>                                      



        </div>
        </div>
</html>
@endsection