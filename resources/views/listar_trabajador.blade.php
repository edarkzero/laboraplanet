@extends('layouts.admin2') 
@section('css')


@endsection


@section('js')



@endsection

@section('contenido')
                
  <div id="app">
  
    <chat v-bind:lista="{{ $trabajadores }}" v-bind:chats="[]" v-bind:user="[{{ Auth::user()->id }},`{{ Auth::user()->nombres." ".Auth::user()->apellidos }}`,`{{ Auth::user()->imagen }}`]"></chat>
  </div>

@endsection