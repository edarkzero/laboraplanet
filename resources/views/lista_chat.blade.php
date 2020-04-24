@extends('layouts.admin2') 
@section('css')


@endsection


@section('js')



@endsection

@section('contenido')
                
  <div id="app">
  	        {{-- <list ></list> --}}

    <chat v-bind:lista="{{ Auth::user()->chat }}" v-bind:chats="[]" v-bind:user="[{{ Auth::user()->id }},`{{ Auth::user()->nombres." ".Auth::user()->apellidos }}`,`{{ Auth::user()->imagen }}`]"></chat>
  </div>
 <!--<script src="{{ asset('js/app.js') }}"></script> -->
            
@endsection