@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                <form action="{{action('loanController@update', $loan->id) }}" method="post">
                               {!! method_field('patch') !!}    
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="date">Date:</label>
                                    <input type = "date" name="date" value="{{$loan->data}}" id="date">
                                    </p>
                                    
                                    <p class="al-left">
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" value="{{$loan->nume}}" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="period">Period(months):</label>
                                    <input  type = "number" name="period" value="{{$loan->durata}}" id="period">
						            </p>    

                                    <p class="al-left">
						            <label for="month">Month Rate(euro):</label>
                                    <input type = "number" name="month" value="{{$loan->valoare_rata_luna}}" id="month">
                                    </p>

                                    <p class="al-left">
						            <label for="amount">Amount:</label>
                                    <input type = "number" name="amount" value="{{$loan->valoare_totala}}" id="amount">
                                    </p>
                                    
						            <input type="submit" class="btn btn-sm btn-warning glyphicon glyphicon-pencil" name="submit" value="Edit">
						            <br><br>
                                  </form>                                      



        </div>
        </div>
</html>
@endsection