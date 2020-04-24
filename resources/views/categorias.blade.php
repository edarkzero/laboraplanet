@extends('layouts.admin2')
@section('css')

@endsection
@section('contenido') 
<br/><br/>
<div class="row">
  <div class="col-md-2">
    
  </div>
  <div class="col-md-8" align="center">
   <div class="panel panel-system">
  <div class="panel-heading" >
    <p class="panel-title" >.: TODAS LAS CATEGORIAS DE LABORAPLANET :.</p>
  </div>
  <div class="panel-body">

    @foreach($categorias as $cat)
      <div class="col-md-3 category">
      <a href="javascript:void(0);" style="text-decoration: none;">
        <div style="background: #37bc9b; color: #fff; width: 100%; height: 30px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
          <p style="margin-top: 5px; margin-bottom: 0px; text-align: center;">{{ $cat->description }}</p>
        </div>
        <img src="{{ $cat->img_categoria }}" alt="AQUI VA LA IMAGEN :v" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; margin-bottom: 20px; width: 100%;">
      </a>
      </div>

    @endforeach

  </div>
</div>
</div>
<div class="col-md-2">
  
</div>
 
</div>



@endsection
@section('js')

@endsection
