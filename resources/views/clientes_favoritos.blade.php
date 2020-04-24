@extends('layouts.admin2')
@section('css')
<link rel="stylesheet" type="text/css" href="assets/fonts/icomoon/icomoon.css">
@endsection
@section('contenido')
   <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
     
<div class="admin-form theme-primary">

              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px">@lang('admin.txtclientesfavoritoscf')</span>
                    </div>
                  

                    <div class="panel" style="background-color:#DBDBDB ;border-radius: 50px;">
                              <center>
                                <h2>Opps!</h2>
                                <h3>@lang('admin.txtaunnotienesclifavcf')</h3>
                                    {{-- <i class="fa fa-users icon-bg"></i> --}}
                                <span class="imoon imoon-user3" style="font-size:7em; margin:10px auto;"></span>
                                <h3>@lang('admin.txttemostramejorcliencf')</h3><br>
                              </center>      
                    </div>

                    <div class="section-divider mv40" id="spy3">
                      <span style="font-size: 25px">@lang('admin.txtcliedestacados')</span>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="section"><br>
                          <div class="smart-widget sm-right smr-50">
                            <label class="field">
                              <input type="text" name="sub" id="sub" class="gui-input" placeholder="@lang('admin.placeholdrbuscliecf')">
                            </label>
                            <div  class="button btn-primary">
                              <i class="fa fa-search"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                       </div>
                 <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 23px;font-weight: bold;color: #3bafda">Usuario</p>
                           <p style="font-size: 18px">
                            <span class="fa-1x fa fa-map-marker"></span>&nbsp;Dirección&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa-phone">  </span>&nbsp;(870) 288-4149   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa fa-comments ">  </span>&nbsp;usuario@example.com
                          </p><br>
                          <p style="font-size: 17px">
                           Información del cliente
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 15%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="imoon imoon-remove2 ">&nbsp; @lang('admin.btneliminarcf')</button></p>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="fa fa-comments ">&nbsp;  @lang('admin.btncontaccf')</button></p>
                          </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>
    <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 23px;font-weight: bold;color: #3bafda">Usuario </p>
                           <p style="font-size: 18px">
                            <span class="fa-1x fa fa-map-marker"></span>&nbsp;Dirección&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa-phone">  </span>&nbsp;(870) 288-4149   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa fa-comments ">  </span>&nbsp;usuario@example.com
                          </p><br>
                          <p style="font-size: 17px">
                            Información del cliente
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 15%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="imoon imoon-remove2 ">&nbsp; @lang('admin.btneliminarcf')</button></p>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="fa fa-comments ">&nbsp;  @lang('admin.btncontaccf')</button></p>
                          </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>
                      <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 23px;font-weight: bold;color: #3bafda">Usuario </p>
                           <p style="font-size: 18px">
                            <span class="fa-1x fa fa-map-marker"></span>&nbsp; Dirección&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa-phone">  </span>&nbsp;(870) 288-4149   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="fa-1x fa fa fa-comments ">  </span>&nbsp;usuario@example.com
                          </p><br>
                          <p style="font-size: 17px">
                            Desarrollador de software en Expinn Technology
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 15%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="imoon imoon-remove2 ">&nbsp; @lang('admin.btneliminarcf')</button></p>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px"> <span class="fa fa-comments ">&nbsp;  @lang('admin.btncontaccf')</button></p>
                          </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
           
@endsection