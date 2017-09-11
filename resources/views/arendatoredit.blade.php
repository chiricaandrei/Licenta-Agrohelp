@extends('layouts.app')

@section('content')
<link href="{{ asset('css/loans.css') }}" rel="stylesheet">


<html>

        <div class="container">
            <div class="row">
                <form action="{{action('arendatorController@update', $arendator->id) }}" method="post">
                               {!! method_field('patch') !!}    
                                    <p class="al-left">
                                    {{csrf_field()}}
						            <label for="name">Name:</label>
                                    <input  type = "text" name="name" value="{{$arendator->nume}}" id="name">
						            </p>  

                                    <p class="al-left">
						            <label for="teren">Field number:</label>
                                    <input  type = "text" name="teren" value="{{$arendator->cod_teren}}" id="teren">
						            </p>    

                                    <p class="al-left">
						            <label for="cnp">CNP:</label>
                                    <input type = "number" name="cnp" value="{{$arendator->CNP}}" id="cnp">
                                    </p>

                                      <p class="al-left">
						            <label for="titlu">Property title:</label>
                                    <input  type = "text" name="titlu" value="{{$arendator->titlu}}" id="titlu">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="tarla">Zone no:</label>
                                    <input  type = "text" name="tarla" value="{{$arendator->tarla}}" id="tarla">
						            </p>    

                                    <p class="al-left">
						            <label for="parcela">Parcela:</label>
                                    <input  type = "text" name="parcela" value="{{$arendator->parcela}}" id="parcela">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="bloc">Physical block:</label>
                                    <input  type = "text" name="bloc" value="{{$arendator->bloc}}" id="bloc">
						            </p>    
                                      
                                      <p class="al-left">
						            <label for="arenda">Lease:</label>
                                    <input  type = "text" name="arenda" value="{{$arendator->arenda}}" id="arenda">
						            </p> 

                                      <p class="al-left">
						            <label for="suprafata">Surface(ha):</label>
                                    <input  type = "number" step="0.01" name="suprafata" value="{{$arendator->suprafata}}" id="suprafata">
						            </p>    
                                    
						            <input type="submit" class="btn btn-sm btn-warning glyphicon glyphicon-pencil" name="submit" value="Edit">
						            <br><br>
                                  </form>                                      



        </div>
        </div>
</html>
@endsection