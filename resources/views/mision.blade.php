@extends('layouts.admin2')

@section('css')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">
  <link rel="shortcut icon" href="assets/img/favicon.ico">

@endsection

@section('js')

@endsection

@section('contenido')
<div class="tray tray-center" style="padding-left: 10px" id="todo">

          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
            <div class="admin-form theme-primary">
                                   <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 22px;font-weight: bold;">LABORAPLANET</span>
                    </div>

                    <div class="row">
                    	<div class="col-md-2">

                    	</div>
                    	<div class="col-md-8">
                    <p class="text-primary mn" style="font-size: 16px;font-weight: bold;padding-bottom:10px;padding-top:10px">@lang('traduccion2.txttitlemisionmi')</p>
                    	   <p>
                    	      @lang('traduccion2.txt1misionmi')
                        </p>




                    	</div>
                    	<div class="col-md-2">

                    	</div>
                    </div>


                </div>
              </div>
            </div>
          </div>
</div>


@endsection
