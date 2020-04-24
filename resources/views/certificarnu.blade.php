@extends('layouts.admin2')
@section('css')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'> -->
    <link rel="stylesheet" type="text/css" href="css/wizard.css">
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="select2/select2.min.css"> --}}
     <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
     <link rel="stylesheet" type="text/css" href="css/jQuery-plugin-progressbar.css">

     <!--DESDE AQUI LLEVE YO -->
    <link rel="stylesheet" type="text/css" href="vendor/plugins/tagmanager/tagmanager.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/ladda/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">
    {{-- <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" /> --}}

  <!-- Beginning of compulsory code below -->

  <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
  {{-- <link href="css/dropdown/dropdown.vertical.rtl.css" media="screen" rel="stylesheet" type="text/css" /> --}}
  <link href="css/dropdown/themes/default/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
@endsection
@section('contenido')
  <br/>
  <div class="admin-form mw1000 center-block theme-primary">

              <div class="panel heading-border panel-primary">

                <div class="panel-body bg-light">



                    <div class="section row">

                      <!-- Data Pickers - Field Versions -->
                      <div class="col-md-12">

                        <!-- TimePickers -->
                        <div id="widget1" class="section-divider mb30">
                          <span>CERTIFICACIONES</span>
                        </div>
                        <div class="section">
                          <div class="panel-group">
                            <form action="POST" id="certificacionxd" >
                            <div class="panel">
                              <div class="panel-heading" style="padding: 0px;">
                                <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#accord2" aria-expanded="false">
                                AGREGAR CERTIFICACION
                                </a>
                              </div>
                              <div id="accord2" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                                <div class="panel-body">


                                      <label for="nombre" class="field-label">Nombre *</label>

                                    <div class="section row">
                                        <div class="col-md-12">
                                            <label for="nombre" class="field prepend-icon">
                                                <input type="text" name="nombre" id="nombre" class="gui-input" placeholder="" required>
                                                  <label for="nombre" class="field-icon">
                                                      <i class="fa fa-home"></i>
                                                  </label>
                                            </label>
                                        </div>
                                    </div>


                                    <label for="names" class="field-label">Empresa emisora *</label>

                                  <div class="section row">
                                    <div class="col-md-12">
                                    <label for="month" class="field select">
                                                                <select id="empresa" name="empresa" required>
                                                                  <option value="">- Seleccione -</option>
                                                                    @foreach($patroc_certif as $value)
                                                                      <option value="{{ $value->id_patroc }}"> {{ $value->nom_patr_cert }} </option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="arrow double"></i>
                                                              </label>
                                    </div>
                                  </div>



                                <div class="section row">
                                  <div class="col-md-6">
                                      <label for="fechaexpe" class="field-label">Fecha de expedicion</label>
                                      <label for="fechaexpe" class="field prepend-icon">
                                          <input type="text" name="fechaexpe" id="fechaexpe" class="gui-input dateee" placeholder="DD-MM-YYYY">
                                            <label for="fechaexpe" class="field-icon">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                      </label>
                                  </div>


                                  <div class="col-md-6">
                                    <label for="fechacadu" class="field-label">Fecha de caducidad</label>
                                      <label for="fechacadu" class="field prepend-icon">
                                          <input type="text" name="fechacadu" id="fechacadu" class="gui-input dateee" placeholder="DD-MM-YYYY">
                                            <label for="fechacadu" class="field-icon">
                                                <i class="fa fa-calendar"></i>
                                            </label>
                                      </label>
                                  </div>


                                        <label class="option">
                                                <input type="checkbox"   name="novence" id="novence">
                                                      <span class="checkbox mr10"></span>Este certificado no vence.
                                        </label>

                                </div>



                                <label for="idcrede" class="field-label">ID de la credencial </label>

                              <div class="section row">
                                  <div class="col-md-12">
                                      <label for="idcrede" class="field prepend-icon">
                                          <input type="text" name="idcrede" id="idcrede" class="gui-input" placeholder="" required>
                                            <label for="idcrede" class="field-icon">
                                                <i class="fa fa-code"></i>
                                            </label>
                                      </label>
                                  </div>
                              </div>

                              <label for="urlcrede" class="field-label">URL de la credencial </label>

                            <div class="section row">
                                <div class="col-md-12">
                                    <label for="urlcrede" class="field prepend-icon">
                                        <input type="text" name="urlcrede" id="urlcrede" class="gui-input" placeholder="" required>
                                          <label for="urlcrede" class="field-icon">
                                              <i class="fa fa-code"></i>
                                          </label>
                                    </label>
                                </div>
                            </div>

                                </div>

                                  <div class="panel-footer"><center><button class="btn btn-dark">GUARDAR</button></div>

                              </div>
                            </div>
                            </form>
                          </div>

                          <br/><br/>
                          <div id="widget2" class="section-divider mb30">
                            <span>Certificate con uno de nuestros partners</span>
                          </div>


                          <div class="panel-group">
                              <p>Aun no cuentas con certificaciones?</p>
                              <p>Enlaces que podrian interesarte...</p>

                              <div class="panel">
                                          <div class="panel-body text-center">
                                            <div class="row">
                                                @foreach($patroc_certif as $value)
                                                <div class="col-md-2">
                                                  <a href="{{ $value->enlace_cert }}" target="_blank" class="holder-style p15">
                                                    <img src="{{ $value->logo_patr_cert }}" width="50" height="50" />
                                                    <br><br> <b>{{ $value->nom_patr_cert }}</b>
                                                  </a>
                                                </div>
                                                @endforeach

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
  <script type="text/javascript" src="select2/select2.min.js"></script>
  <script src="vendor/plugins/globalize/globalize.min.js"></script>
  <script src="vendor/plugins/moment/moment.min.js"></script>
  <script src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="assets/js/demo/charts/highcharts.js"></script>
  <script src="vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="vendor/plugins/highcharts/highcharts.js"></script>
  <script src="vendor/plugins/circles/circles.js"></script>
  <script type="text/javascript" src="js/laborajs/perfil.js"></script>
  <script src="vendor/plugins/fileupload/fileupload.js"></script>

    <!-- Typeahead Plugin -->
  <script src="vendor/plugins/typeahead/typeahead.bundle.js"></script>

  <!-- DESDE AQUI OTRAVES -->
    <script src="vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

  <!-- Bootstrap Maxlength plugin -->
  <script src="vendor/plugins/maxlength/bootstrap-maxlength.min.js"></script>


  <!-- TagManager Plugin -->
  <script src="vendor/plugins/tagmanager/tagmanager.js"></script>

  <!-- DateRange Plugin -->
  <script src="vendor/plugins/daterange/daterangepicker.min.js"></script>

  <!-- DateTime Plugin -->
  <script src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>

  <!-- BS Colorpicker Plugin -->
  <script src="vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- MaskedInput Plugin -->
  <script src="vendor/plugins/jquerymask/jquery.maskedinput.min.js"></script>
  <!-- FIN -->
  <script src="js/starrr.js"></script>



  <!-- Tagmanager JS -->
  <script src="vendor/plugins/tagsinput/tagsinput.min.js"></script>
  <script src="js/jQuery-plugin-progressbar.js"></script>

  <script>

  $("#novence").on('click',function(){
    if($('#novence').is(':checked')) {

        //$("#fechaexpe").attr('disabled',true);
        //$("#fechaexpe").val("");

        $("#fechacadu").attr('disabled',true);
        $("#fechacadu").val("");
    }
    else
    {
      $("#fechaexpe").attr('disabled',false);
      $("#fechacadu").attr('disabled',false);
    }
  });


  $("#certificacionxd").submit(function(e){
      e.preventDefault();

      var nombre = $("#nombre").val();
      var empresa = $("#empresa").val();
      var fechaexpe = $("#fechaexpe").val();
      var fechacadu = $("#fechacadu").val();
      var idcrede = $("#idcrede").val();
      var urlcrede = $("#urlcrede").val();

      $.ajax({
        url:'save_certificacion',
        type:'POST',
        dataType:'JSON',
        data:{nombre:nombre,empresa:empresa,fechaexpe:fechaexpe,fechacadu:fechacadu,idcrede:idcrede,urlcrede:urlcrede},
        success:function(response)
        {

          function irxd3()
          {
            location.href = "certificarnu";
          }
          mensaje('Certificado grabado correctamente. Revisa tu perfil!','success');
          setTimeout(irxd3,2000);

        }

      })

  });



  </script>
@endsection
