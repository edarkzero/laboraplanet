@extends('layouts.admin2')
@section('contenido')
@section('css')


@endsection
<script type="text/javascript">


function mostrarPassword(){
 var cambio = document.getElementById("pass_ant");
 if(cambio.type == "pass_ant"){
 cambio.type = "text";
 $('.icon').removeClass('fa fa-lock').addClass('fa fa-unlock-alt');
 }else{
 cambio.type = "pass_ant";
 $('.icon').removeClass('fa fa-unlock-alt').addClass('fa fa-lock');
 }
 }

</script>
<br><br>

        <!-- Fin del Form Popup -->



	<div class="container">
		<div class="admin-form theme-primary tab-pane active" role="tabpanel">
                <div class="panel panel-primary heading-border">
                  <div class="panel-heading">
                    <span class="panel-title">
                      <i class="fa fa-lock"></i>@lang('admin.titleseguridadseg')</span>
                  </div>
                </div>             
              </div>
	</div>

  <div class="container">
    <div class="row">
       <div class="col-md-12">
            <div class="bs-component">
              <div class="panel">
                <div class="panel-heading">
                  <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                    <li class="active">
                      <a href="#tab2_1" data-toggle="tab" aria-expanded="true">@lang('traduccion1.sub1seguridad') </a>
                    </li>
                    <li class="">
                      <a href="#tab2_2" data-toggle="tab" aria-expanded="false">@lang('admin.menucambiarcorreoseg')</a>
                    </li>
                    <li class="">
                      <a href="#tab3_3" data-toggle="tab" aria-expanded="false">@lang('traduccion1.sub2seguridad')</a>
                    </li>
                    
                  </ul>
                </div>
                <div class="panel-body">
                  <div class="tab-content pn br-n">
                    <div id="tab2_1" class="tab-pane active">
                      <div class="row">
                  <div class="col-md-4">
                  </div>   
                   <form id="form-pass">

                  <div class="col-md-4" id="1div">   
                      <div class="section">
                        <div class="input-group">
                         
                          <span class="input-group-addon">
                          <i class="fa fa-lock icon" onclick="mostrarPassword()"></i>
                          </span>
                          <input class="form-control" id="pass_ant" type="password" required placeholder="@lang('admin.placeholcontraanterseg')" name="password">
                        </div><br/>
                          </div>                      

                          <div class="section">
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </span>
                          <input class="form-control" id="new_pass" type="password" required placeholder="@lang('admin.placeholnuevacontraseg')" name="ds">
                        </div>
                            <br/>
                          </div>
                          
                      <div class="section">
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                          </span>
                          <input class="form-control" id="new_pass_con" required type="password" placeholder="@lang('admin.placeholconfircontraseg')" name="">
                        </div>
                            <br/>
                          </div>
                          
                      <div><center><button type="submit" class="btn btn-rounded btn-primary btn-block" id="cambiar">@lang('admin.btncambiarcontraseg')</button></center></div> 
               
                  </div>
         </form>
            <div class="col-md-4" id="efecto" hidden> 
             <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
              <span class="panel-title"> @lang('admin.titleconfirmacontrase') </span>
            </div>
            <div class="panel-body" align="center">
               @php $nombre=Auth::user()->nombres."  ".Auth::user()->apellidos;
                    $correo=Auth::user()->correo;
                    @endphp
              <h3 class="mt5">@lang('admin.txtholacontra') {{ $nombre }}</h3>
              <p>@lang('admin.txtparacompletarverificontra')</p>
              <hr class="short alt">
              <p>@lang('admin.txtintroducecodigoverficontra') <br/>     
                    {{ $correo }}</p>

              <center><input type="text" name="" class="form-control" id="codigo" style="text-align: center;width: 50%" placeholder="--------"></center>
        
            </div>
            <div class="panel-footer text-right">
              <center><button class="btn btn-primary" type="button" id="confirmacion">@lang('admin.btnconfirmarcontrase')</button></center>
            </div>
          </div>
         </div>

         <div class="col-md-4" id="gif" hidden align="center">
            <img src="img/edit/estegif.gif" width="50%" height="50%">
         </div>




                  <div class="col-md-4">
                    
                  </div>  

                      </div>

                    </div>

                    <div id="tab2_2" class="tab-pane">
                         <div class="row">
                          <div class="col-md-4">
                            
                          </div>
                          <form id="form-correo">
                      <div class="col-md-4" id="primerdiv">   
                          <div class="section">
                           <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </span>
                          @php  $correo=Auth::user()->correo;    @endphp
                          <input class="form-control" type="text" placeholder="Correo Electronico anterior" value="{{ $correo }}" disabled>
                        </div> <br/>
                          </div>

          
                          <div class="section">
                           <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </span>
                          <input class="form-control" type="email" id="new_correo" required placeholder="@lang('admin.placeholnuevocorreoseg')">
                          </div> <br/>
                          </div>
                                            
                   
                      <div>
                        <center>
                          <button type="submit" class="btn btn-rounded btn-primary btn-block" id="confircorreo" >@lang('admin.btncambiarcontraseg')</button>
                        </center>
                      </div>

                      </div>
                          <div class="col-md-4" id="gif2" hidden align="center">
            <img src="img/edit/estegif.gif" width="50%" height="50%">
         </div>
                    </form>
                      <div class="col-md-4" id="segundodiv" hidden>
                                         
                        <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
              <span class="panel-title"> @lang('admin.titleconfirmacorreoele') </span>
            </div>
            <div class="panel-body" align="center">
               @php $nombre=Auth::user()->nombres."  ".Auth::user()->apellidos;
                    $correo=Auth::user()->correo;
                    @endphp
              <h3 class="mt5">
              @lang('admin.txtholacontra') {{ $nombre }}</h3>
              
              <p>@lang('admin.txtparacompletarcambiocorreo') <br/>@lang('admin.txtintroduceelcodigodevercorreo') <br/>     
                   <label id="nuevocorreo"> [nuevocorreoelectronico] </label></p>

              <center><input type="text" name="" class="form-control" id="codigo_correo" style="text-align: center;width: 50%" placeholder="--------"></center>
        
            </div>
            <div class="panel-footer text-right">
              <center><button class="btn btn-primary" type="button" id="confirmacion_correo">@lang('admin.btnconfirmarcontrase')</button></center>
            </div>
          </div>
                     
                      </div>

                      <div class="col-md-4">
                        
                      </div>
                      </div>
                    </div>

                    <div id="tab3_3" class="tab-pane">
                        <div class="row" align="center" style="height: 213px">
                          <div class="col-md-4">
                            
                          </div>
                          <div class="col-md-4">
                            <br/><br/><br/><br/>
                                <button id="baja" type="button" class="btn btn-danger light btn-block fw600">@lang('traduccion1.sub3seguridad')</button>
                          </div>
                          <div class="col-md-4">
                            
                          </div>
                        </div>

                    </div>
             
                  </div>
                </div>
              </div>
            </div>

          </div>
      
        </div>
  </div>

@endsection

@section('js')

<script type="text/javascript" src="js/laborajs/seguridad.js"></script>
<script src="js/bootbox.all.min.js"></script>
<script src="js/bootbox.locales.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootbox/bootbox.min.js') }}"></script>
@endsection