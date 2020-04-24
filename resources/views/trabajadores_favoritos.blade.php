@extends('layouts.admin2')
@section('js')
<script type="text/javascript" src="js/laborajs/trabajadores_favoritos.js"></script>
@endsection
@section('contenido')
   <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
            <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  {{-- <form method="post" action="" id="form-ui"> --}}
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px">@lang('admin.txtrabajodresfavoritos')</span>
                    </div>
          
@if(count($favoritos)==0)
<?php $vista=""; ?>
@else
<?php $vista="none"; ?>
  <div class="row">
                      <div class="col-md-6">
                        <div class="section"><br>
                          <div class="smart-widget sm-right smr-50">
                            <label class="field">
                              <input type="text" name="sub" id="sub" class="gui-input" placeholder="@lang('admin.plachelderbuscartrabafav')">
                            </label>
                            <div  class="button btn-primary">
                              <i class="fa fa-search"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                       </div>
              @foreach($favoritos as $value)  
              <div class="panel-1">    
                 <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->nombres." ".$value->apellidos }} </p>
                          <p >
                            <span class="fa-2x fa fa-map-marker"> *********  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-2x fa fa-phone"> ****** </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-2x fa fa fa-comments "> ********** </span>
                          </p><br>
                          <p style="font-size: 17px">
                            {{ $value->perfil }}
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 15%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block eliminar" data-id='{{ $value->id }}' style="width: 150px"><span class="fa fa-trash">&nbsp; Remover</button></p>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="fa fa-comments ">&nbsp;  @lang('admin.btncontactartrafav')</button></p>
                          </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>
                  </div>
                @endforeach
@endif
                  <div class="panel falta" style="background-color:#DBDBDB ;border-radius: 50px;display:{{ $vista }}">
                              <center>
                                <h2>Opps!</h2>
                                <h3>@lang('admin.txtaunnotienetrabfav')</h3>
                                    {{-- <i class="fa fa-users icon-bg"></i> --}}
                                <span class="fa fa-users" style="font-size:7em; margin:10px auto;"></span>
                                <h3>@lang('admin.txttemostraremos')</h3><br>
                              </center>      
                    </div>
                
                    <div class="section-divider mv40" id="spy3">
                      <span style="font-size: 25px">@lang('admin.txttrabadestacdos')</span>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="section"><br>
                          <div class="smart-widget sm-right smr-50">
                            <label class="field">
                              <input type="text" name="sub" id="sub" class="gui-input" placeholder="@lang('admin.plachelderbuscartrabafav')">
                            </label>
                            <div  class="button btn-primary">
                              <i class="fa fa-search"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                       </div>
                @foreach($trabajadores as $value)      
                 <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->nombres." ".$value->apellidos }} </p>
                          <p >
                            <span class="fa-2x fa fa-map-marker"> *********  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-2x fa fa-phone"> ****** </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-2x fa fa fa-comments "> ********** </span>
                          </p><br>
                          <p style="font-size: 17px">
                            {{ $value->perfil }}
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 15%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="fa fa-comments ">&nbsp;  @lang('admin.btncontactartrafav')</button></p>
                          <p><button class="btn btn-sm btn-primary btn-block agregar" data-id='{{ $value->id }}' style="width: 150px">@lang('admin.btnañadirfavovtrafav')</button></p>
                          </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>
                @endforeach
                    {{-- </form> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
           
@endsection