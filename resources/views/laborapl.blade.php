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
                      <span style="font-size: 22px;font-weight: bold;">@lang('traduccion2.txtcomofunclaborapl')</span>
                      <br/>
                    </div>

                    <div class="row">
                    	<div class="col-md-2">

                    	</div>
                    	<div class="col-md-8">



                    	<p align="justify">
                    	  @lang('traduccion2.txtlaborpl1')

                    	</p>

                    	<p class="text-primary mn" style="font-size: 18px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion2.txtempresaclienlaborpl')</p>

                      <p align="justify">
                        @lang('traduccion2.txtlaborpl2')
                      </p>


                      <br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborpl3')</b> @lang('traduccion2.txtlaborpl4')<br/><br/>
&emsp;• @lang('traduccion2.txtlaborp15')<br/>
&emsp;• @lang('traduccion2.txtlaborp16') <br/>
&emsp;• @lang('traduccion2.txtlaborp17')<br/>&emsp; @lang('traduccion2.txtlaborpl8') <br/>
&emsp;• @lang('traduccion2.txtlaborpl9')
</p>
                        </div>
                        <div class="col-md-3">
      <img src="{{ asset('img/Imagenes_reducidas/Clientes/1-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                        <br/>

                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp20')</b> <br/><br/>
&emsp;• @lang('traduccion2.txtlaborp21')<br/>
&emsp;• @lang('traduccion2.txtlaborp22') <br/>
&emsp;• @lang('traduccion2.txtlaborp23') <br/>
&emsp;• @lang('traduccion2-txtlaborp24') <br/><br/>
<img src="{{ asset('img/elige_colaboradores.png') }}" width="100%">
</p>
                        </div>
                        <div class="col-md-3">
                          <br/><br/>
      <img src="{{ asset('img/Imagenes_reducidas/Clientes/2-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/>

                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp25') </b> <br/><br/>
&emsp;• @lang('traduccion2.txtlaborp26')<br/> &emsp;@lang('traduccion2.txtlaborp27') <br/>&emsp;@lang('traduccion2.txtlaborp28')<br/><br/>
&emsp;• Califica a nuestro Colaborador.
</p>
                        </div>
                        <div class="col-md-3">
                          <img src="{{ asset('img/Imagenes_reducidas/Clientes/3-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/>

<p class="text-primary mn" style="font-size: 18px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion2.txtlaborp29')</p>

                    <p align="justify">
                        @lang('traduccion2.txtlaborp30')
                      </p>
                      <br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp31')</b><br/>
&emsp;@lang('traduccion2.txtlaborp32')<br/><br/>
&emsp;• @lang('traduccion2.txtlaborp33') <br/>&emsp;@lang('traduccion2.txtlaborp34') <br/>
&emsp;• @lang('traduccion2.txtlaborp35')
</p>
                        </div>
                        <div class="col-md-3">
      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/1-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp36')</b><br/><br/>
&emsp;• @lang('traduccion2.txtlaborp37')<br/> &emsp;@lang('traduccion2.txtlaborp38')<br/>
&emsp;• @lang('traduccion2.txtlaborp39')</p>
                        </div>
                        <div class="col-md-3">
                            <br/>
      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/2-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp40')</b><br/><br/>
&emsp;• @lang('traduccion2.txtlaborp41') <br/>&emsp; @lang('traduccion2.txtlaborp42') <br/>&emsp; @lang('traduccion2.txtlaborp43')<br/>
&emsp;• @lang('traduccion2.txtlaborp44') <br/> &emsp; @lang('traduccion2.txtlaborp45')</p>
                        </div>
                        <div class="col-md-3">

      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/3-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp46')</b><br/><br/>
&emsp;• @lang('traduccion2.txtlaborp47') <br/>&emsp;@lang('traduccion2.txtlaborp48')<br/>&emsp;@lang('traduccion2.txtlaborp49')<br/>
</p>
                        </div>
                        <div class="col-md-3">

      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/4-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp50')</b><br/><br/>
&emsp;• @lang('traduccion2.txtlaborp51')<br/>
&emsp;• @lang('traduccion2.txtlaborp52')
</p>
                        </div>
                        <div class="col-md-3">

      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/5-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

                      <br/><br/><br/>
                      <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-7">
<p align="justify"><b>@lang('traduccion2.txtlaborp53')</b><br/><br/>
&emsp;• @lang('traduccion2.txtlaborp54') <br/>&emsp;@lang('traduccion2.txtlaborp55') <br/>&emsp;@lang('traduccion2.txtlaborp56')<br/>
&emsp;
</p>
                        </div>
                        <div class="col-md-3">

      <img src="{{ asset('img/Imagenes_reducidas/Colaboradores/6-1.png') }}" style="width: 100%; background-repeat: no-repeat;">
                        </div>
                        <div class="col-md-1">

                        </div>
                      </div>

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
