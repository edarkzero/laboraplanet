@extends('layouts.admin2') 
{{-- @section('css')


@endsection --}}

{{-- 
@section('js')



@endsection
 --}}

@section('contenido')


<meta name="friendId" content="{{ $id->id }}">
<div id="app">
<br><center>
	<?php
		$u= "../img/none.png";
		$un = Auth::user()->nombres." ".Auth::user()->apellidos;
		$cn = $id->nombres." ". $id->apellidos;
		if (Auth::user()->imagen!=null) {
			if (substr(Auth::user()->imagen,0, 6)=='images') {
				$u = "../".Auth::user()->imagen;	
			}else{
				$c = $id->imagen;
			}
		}

		$c= "../img/none.png";
		if ($id->imagen!=null) {
			if (substr($id->imagen,0, 6)=='images') {
			$c = "../". $id->imagen;	
			}else{
			$c = $id->imagen;
			}
		}
	?>
<div class="container" style="align-content: center;">
  	<div class="col-md-12">
   		<chat v-bind:chats='chats' v-bind:userid='{{ Auth::user()->id }}' v-bind:friendid='{{ $id->id }}' v-bind:uimg='`{{ $u }}`' v-bind:cimg='`{{ $c }}`' v-bind:cnom='`{{ $cn }}`' v-bind:unom='`{{ $un }}`'></chat>           
	</div>
</div>


 </div>
          <script src="{{ asset('js/app.js') }}"></script>

@endsection