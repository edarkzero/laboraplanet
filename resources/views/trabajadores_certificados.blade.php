@extends('layouts.admin2')

@section('css')
 
@endsection
@section('contenido')
 <div class="tray tray-center" style="padding-left: 10px">
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
     
<div class="admin-form theme-primary">

              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
                  <form method="post" action="" id="form-ui">
                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 25px">@lang('admin.txttrabajacertifi')</span>
                    </div>
                  
          <div class="panel">
              <div class="panel-heading" style="padding: 0px;">
                <span class="panel-title" style="font-size: 17px;"> &nbsp; @lang('admin.txtbuscartrabajadorestc') </span>
              </div>
              <div class="panel-body p25 pb10">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">      
                          <select class="form-control" name="categoria" id="categoria">
                            <option value="">@lang('traduccion1.sub1trabajadores_certificados')</option>
                            @foreach($categoria as $value)
                            <option value="{{ $value->id_category}}">{{ $value->description }}</option>
                            @endforeach
                          </select>                 
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">   
                          <select class="form-control" name="habilidades" id="habilidades">
                            <option></option>
                          </select>               
                      </div>
                    </div>


                  </div>
              </div>
            </div>
            <div id="cambiar">
                   @foreach($va as $value)
                   <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2" style="padding-top:14px"><center><img src="img/none.png" width="130" height="120" style="border-radius: 60%; "></center></div>
                        <div class="col-md-7">
                          <p style="font-size: 20px;font-weight: bold;color: #3bafda">{{ $value->nombres }}</p>
                             <span class="fa-2x fa fa-map-marker"> ********** </span> &nbsp; 
                             <span class="fa-2x fa fa-phone"> ****** </span>      &nbsp;                     
                             <span class="fa-2x fa fa fa-comments "> ********** </span>
                            <p style="font-size: 1.2em; margin-top:10px;">@if ($value->perfil=="")
                              @lang('traduccion1.sub2trabajadores_certificados')
                              @else
                              {{ $value->perfil }}
                            @endif</p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 20%">
                          <center>
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px;height: 35px;"><i class="fa fa-comment"></i> @lang('admin.btncontactartc') </button></p>
                          </center></div>
                        </div>
                      </div>                
                    </div>
                  </div>
                  @endforeach
                  {{-- <center>{{ $va->links() }}</center> --}}
                  </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
@section('js')
<script type="text/javascript" src="js/laborajs/certificados.js"></script>
@endsection