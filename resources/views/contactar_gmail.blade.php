@extends('layouts.admin2')

@section('css')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 7px;
  height: 13px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
@endsection

@section('js')

@endsection

@section('contenido')
<div class="tray tray-center" style="padding-left: 10px" id="todo">

          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
            <div class="admin-form theme-primary">
                                   <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  <form method="POST">
                    <!--<div class="section-divider mb40" id="spy1">       -->
                    <!--  <span style="font-size: 22px;font-weight: bold;">Fortalece tu red:</span>-->
                    <!--</div>-->

                    <div class="row">
                    	<div class="col-md-2">

                    	</div>
                    	<div class="col-md-8">

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion2.txtamigos')</p>


                      @foreach($contacto as $value)
                       <?php
                        $nombre = "";
                        $mostrar = "";
                        if (isset($value['email'])) {
                          $mostrar =$value['email'];
                        }else{
                          if (isset($value['nombre'])) {
                            if(isset($value['celular'])){
                                $nombre = $value['nombre']." - ";
                                $mostrar=$value['celular'];

                            }
                          }
                        }
                        ?>
                        @if($mostrar!="")
                            <div>
                                <hr>
                                <div class="col-md-2">
                                    <img src="{{ $value['foto'] }}"><br><br>
                                </div>
                                <div class="col-md-8" style="color: #164592;font-weight: bold;padding-left: 30px;font-size: 15px"><br><br>
                                    {{ $nombre.$mostrar }}
                                    <br><br><br>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <label class="container">
                                    <input type="checkbox"  name="emails[]" checked value="{{ $mostrar }}">
                                    <span class="checkmark" ></span>
                                    </label>
                                </div>
                                <br><br><br><br><br>
                            </div>
                        @endif

                      @endforeach
                      <hr>




                    	</div>
                    	<div class="col-md-2">

                    	</div>
                    </div>
                    <center><button class="btn btn-primary">@lang('traduccion2.txtenviarinvitac')</button></center>
</form>
                </div>
              </div>
            </div>
          </div>
</div>


@endsection
