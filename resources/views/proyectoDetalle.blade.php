@extends('layouts.admin2')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/icomoon/icomoon.css')}}">
@endsection
@section('contenido')
   <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
     
<div class="admin-form theme-primary">


              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 21px">{{strtoupper($dato[0]['titulo'])}}</span>
                    </div>
                  
            <div class="panel panel-info panel-border top mb35">
              <div class="panel-body bg-light dark">
                <div class="admin-form">
                <div class="row">
                  <div class="col-md-6">
                      <div class="section row mb10">
                        <label for="business-name" class="field-label col-md-3 text-center">@lang('admin.titleestadoapl'):</label>
                        <div class="col-md-9">
                         <label for="business-name" class="field prepend-icon gui-input">
                          <?php
                          $estadox = $dato[0]['estado'];
                          $plases = "";
                          if($estadox == 1)
                          {
                            $plases = "Publicado";
                          }
                          elseif($estadox == 2)
                          {
                            $plases = "Publicado";
                          }
                          elseif($estadox == 3)
                          {
                            $plases = "Evaluando";
                          }
                          elseif($estadox == 4)
                          {
                            $plases = "Trabajando";
                          }
                          elseif($estadox == 5)
                          {
                            $places = "Finalizado"; 
                          }
                          else
                          {
                            $places = '---';
                          }
                          ?>
                        <!--<input type="text" name="business-name" id="business-name" class="gui-input" disabled placeholder="{{$plases}}" >-->
                                                <!--<span class="gui-input">{{$plases}}</span>-->
                                            <label style='margin-left:25px'>    {{$plases}}</label>

                        <label for="business-name" class="field-icon">
                          <i class="fa fa-star-half-empty"></i>
                          </label>
                         </label>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                         <div class="section row mb10">
                    <label for="business-name" class="field-label col-md-3 text-center">@lang('admin.titletiempoapl'):</label>
                    <div class="col-md-9">
                         <label for="business-name" class="field prepend-icon gui-input">
                        <?php
                          $tipotiem = $dato[0]['tiempo_entrega'];
                          $plastime = "";
                          if($tipotiem == 1)
                          {
                              $plastime = "Horas";
                          }
                          if($tipotiem == 2)
                          {
                            $plastime = "Dias";
                          }
                          if($tipotiem == 3)
                          {
                            $plastime = "Semanas";
                          }
                          if($tipotiem == 4)
                          {
                            $plastime = "Meses";
                          }

                        ?>
                        <!--<input type="text" name="business-name" id="business-name" class="gui-input" placeholder="" disabled>-->
                                                                    <label style='margin-left:25px'>    {{$dato[0]['cantidad_tiempo']}} {{$plastime}}</label>

                        <label for="business-name" class="field-icon">
                          <i class="fa fa-clock-o"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                  </div>             
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="section row mb10">
                    <label for="business-name" class="field-label col-md-3 text-center">@lang('traduccion1.sub1proyectoDetalle')</label>
                    <div class="col-md-9">
                         <label for="business-name" class="field prepend-icon gui-input">
                        <!--<input type="text" name="business-name" id="business-name" class="gui-input" disabled placeholder="">-->
                                                                                            <label style='margin-left:25px'>  $ {{$dato[0]['presupuesto']}}</label>

                        <label for="business-name" class="field-icon">
                          <i class="fa fa-money"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                  </div>
                  
                </div>



                  <hr class="short alt">

                  
                  <div class="section row mb10">
                    <label for="business-phone" class="field-label col-md-3 text-center">@lang('traduccion1.sub2proyectoDetalle')</label>
                    <div class="col-md-9">
                        <label class="field prepend-icon gui-textarea">
                    <!--<textarea class="" name="present" disabled placeholder="{{$dato[0]['habilidades']}}"></textarea>-->
                                                                                                                <label style='margin-left:25px'>{{$dato[0]['habilidades']}}</label>
                    <label for="present" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>
                    </label>
                    </div>
                  </div>

                  <div class="section row mb10">
                    <label for="business-phone" class="field-label col-md-3 text-center">@lang('traduccion1.sub3proyectoDetalle')</label>
                    <div class="col-md-9">
                        <label class="field prepend-icon gui-textarea">
                    <!--<textarea class="gui-textarea" name="present" disabled placeholder="{{$dato[0]['descripcion']}}"></textarea>-->
                        <label style='margin-left:25px'>{{$dato[0]['descripcion']}}</label>
                    <label for="present" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>
                    </label>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </form>
      </div>
             
                <div class="panel-footer text-right" >
                <center><a type="button" href="{{ route('aplicar',$dato[0]['id']) }}" class="btn btn-rounded btn-system" ><span class="fa fa-check"></span> @lang('traduccion1.sub4proyectoDetalle') </a> &emsp;
                <a type="button" href="{{ route('index')}}" class="btn btn-rounded" ><span class="glyphicon glyphicon-remove"></span> @lang('traduccion1.sub5proyectoDetalle') </a></center>
                </div>
                
                </div>
              </div>
            </div>
          </div>
           
@endsection