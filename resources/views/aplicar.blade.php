@extends('layouts.admin2')

@section('css')
<!--  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href= "{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico')}}"> -->

@endsection

@section('contenido')
</br>

<!----------------------------- formulario para envio ------------------------------------------------>

<!--NUEVO -->




      <div class=" mw1000 center-block">
           <!--     <div class=" mw1000 center-block animated fadeIn">-->
          <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">

                    <div class="section-divider mb40" id="spy1">
                      <span style="font-size: 20px">{{strtoupper($proyecto['titulo'])}}</span>
                    </div>





            <div class="row">
              <div class="col-md-1">

              </div>
                          <div class="col-md-10">
                          <form id="postular" method="POST" enctype="multipart/form-data" action="{{ route('savepostu') }}">
                        {{csrf_field()}}

                      <div id="widget1" class="section-divider mb30">
                        <span>@lang('traduccion2.txtpresencoor')</span>
                      </div>
                      <!-- EL TEXTAREA-->
                     <div class="section">
                    <label class="field prepend-icon">
                    <textarea class="gui-textarea" name="present" placeholder="Digite un mensaje" maxlength="3455">@lang('traduccion2.txtestimado') {{$ususaludo[0]['usuario']}} @lang('traduccion2.txtestimado2c') </textarea>
                    <label for="present" class="field-icon">
                      <i class="fa fa-comments"></i>
                    </label>

                  </div>
                    <input type="text" name="codigo" hidden="" id="codigo" value="{{$proyecto['id']}}" >
                      <!-- FIN -->
                      <div class="row">
                        <div class="col-md-6">
                         <div id="widget2" class="section-divider mb30">
                        <span>@lang('traduccion2.txtdeseasadjuntar')</span>
                        </div>
                        <!-- EL INPUT TIPO FILE -->
                    <div class="section">
                    <label class="field prepend-icon append-button file">
                      <span class="button btn-primary">@lang('traduccion2.btnseleccione')</span>
                      <input type="file" class="gui-file" name="file" id="file" onchange="return devuelve(this);">
                      <input type="text" name="uploader1" class="gui-input" id="uploader1" placeholder="@lang('traduccion2.placeholselect')">
                      <label class="field-icon">
                        <i class="fa fa-upload"></i>
                      </label>
                      @if($errors->has('file'))
                       <h5 style="color: red;">Solo se permite archivos (.pdf) | (.docx)</h5>
                      @endif
                      <h6><small>@lang('traduccion2.txtarchivosconex')</small></h6>
                    </label>
                      </div>
                        </div>

                        <div class="col-md-6">
                                    <div id="widget3" class="section-divider mb30">
                              <span> @lang('traduccion2.txttupropuesecono') </span>
                            </div>
                          <div class="section">
                                  <label class="field prepend-icon">
                                    <input type="text"  name="money" class="gui-input" placeholder="0.00" required value="{{$proyecto['presupuesto']}}" />
                                    <b class="tooltip tip-right-bottom"><em>@lang('traduccion2.cliseagregara')</em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-usd"></i>
                                    </label>
                                  </label>
                                  <h6><small>@lang('traduccion2.txtelmontoindicad')</small></h6>
                         @if($errors->has('money'))
                        <label style="color: red;">Campo Numerico</label>
                        @else

                      @endif
                        </div>
                        </div>
                      </div>

                        <!-- FIN -->


                          <!-- FIN -->
<!-- <input type="text" name="usudeproyecto" hidden value="{{$nombreusu[0]['id'].$nombreusu[0]['nombres'].$nombreusu[0]['apellidos'].$nombreusu[0]['usuario'].$nombreusu[0]['correo'].$nombreusu[0]['pass_simple']}}"> -->

                              <input type="text" name="idusuarioproyecto" hidden value="{{$nombreusu[0]['id']}}">
                              <input type="text" name="usudeproyecto" hidden value="{{$nombreusu[0]['nombres'].' '.$nombreusu[0]['apellidos']}}">
                              <input type="text" name="correousuproyecto" hidden value="{{$nombreusu[0]['correo']}}">
                              <input type="text" name="nombredeproyectousu" hidden value="{{strtoupper($proyecto['titulo'])}}">
                              <input type="text" name="idproyectousu" hidden value="{{$proyecto['id']}}">

                                <div id="widget3" class="section-divider mb30">
                                   <span>@lang('traduccion2.txttiemofinali')</span>
                                </div>

                <div class="row">
                <div class="col-md-6">


                             <label class="field prepend-icon">
                                    <input type="text"  name="time" class="gui-input" placeholder="@lang('traduccion2.placeholdigitiem')"  onkeypress="return soloNumeros(event);" required />
                                    <b class="tooltip tip-right-bottom"><em> @lang('traduccion2.clidigiteaquiti')</em></b>
                                    <label for="tooltip3" class="field-icon">
                                      <i class="fa fa-clock-o"></i>
                                    </label>
                            </label>

                  @if($errors->has('time'))
                      <h5 style="color: red;">Este Campo es Requerido y Numerico</h5>
                  @endif
                      <br/>
                   </div>

                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </span>
                    <select  class="form-control" name="type_time" required>
                      <option value="">@lang('traduccion2.opcselectiemp1')</option>
                      <option value="1">@lang('traduccion2.opcselectiemp2')</option>
                      <option value="2">@lang('traduccion2.opcselectiemp3')</option>
                      <option value="3">@lang('traduccion2.opcselectiemp4')</option>
                      <option value="4">@lang('traduccion2.opcselectiemp5')</option>
                    </select>
                  </div>
                     @if($errors->has('type_time'))
                      <h5 style="color: red;">Seleccione una Categoria</h5>
                      @endif
                </div>

                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                      <button class="btn active btn-system btn-block" >@lang('admin.btnpostularapl')</button>
                      <br/>
                    </div>

                    <div class="col-md-3">
                       <a href="{{ asset('buscar_trabajo')}}"><button type="button" class="btn active btn-system btn-block">@lang('admin.btnvolverapl')</button></a>
                    </div>

                    <div class="col-md-3">

                    </div>

                  </div>

                     </form>
                   </div>
                   <div class="col-md-1">

                   </div>
                 </div>

                  </div>
                </div>
              </div>
            </div>






@endsection



@section('js')
<script type="text/javascript" src= "{{ asset('datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src= "{{ asset('datatable/dataTables.bootstrap.min.js')}}"></script>
{{-- <script type="text/javascript" src= "{{ asset('vendor/plugins/pnotify/pnotify.js') }}"></script> --}}
<script type="text/javascript" src= "{{ asset('datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('js/notify.min.js')}}"></script>
{{--<script type="text/javascript" src= "{{ asset('js/laborajs/aplicar.js')}}"></script>--}}
<script type="text/javascript">
               // $(document).ready(function() {
               // });

        function yapostulo()
        {
             $.notify(
              "¡. Usted Ya postulo a este requerimiento .!",
              { position:"left middle",
                className: 'error',
              }
                )
        }
        function mismo()
        {
             $.notify(
              "¡.Usted No puede aplicar a su mismo requerimiento .!",
              { position:"left middle",
                className: 'error',
              }
                )
        }

        function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}

     function devuelve(x)
        {
    var fileInput = document.getElementById('file');
    var fileInputSize = document.getElementById('file').files[0].size;

    if(fileInputSize > 25000000)
    {
      mensaje("Solo se permite archivos de tamaño maximo de 25 MB",'warning');
      fileInput.value = '';
      return false;
    }

    var filePath = fileInput.value;
    var allowedExtensions = /(.doc|.docx|.pdf|.xlsx|.xls|.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        mensaje("Solo se permiten archivos con extension .docx o .pdf o .xlsx o .png",'error');
        fileInput.value = '';
        return false;
    }else{

 document.getElementById('uploader1').value = x.value;
    }

        }



</script>
    @if($status = Session::get('yapostulo'))
          <script type="text/javascript">
              yapostulo();
          </script>
    @endif

    @if($status = Session::get('creador'))
          <script type="text/javascript">
              mismo();
          </script>
    @endif

@endsection
