@extends('layouts.admin2')
   @section('css')
   <meta name="description" content="Tienes un proyecto en mente.. Nosotros te ayudamos a hacerlo realidad.">
   <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

   <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

   <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

   <link rel="stylesheet" type="text/css" href="vendor/plugins/ladda/ladda.min.css">

   <link rel="shortcut icon" href="{{ asset('img/siosi3.png')}}" style="width=100%;">

   <meta name="googlebot" content="noindex, nofollow" />


   <style>
   .ladda-button[data-style=contract][data-loading] {
     width: 35px;
   }
   </style>
   @endsection

   @section('contenido')
     <br>
   <section class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="mw1000 center-block">
        <!-- Begin: Admin Form -->
        <div class="admin-form">
          <div class="panel heading-border panel-primary" >
            <div class="panel-body bg-light">
              <form method="post"  id="contacto">
                    {{ csrf_field() }}
                <div class="section-divider mb40" id="spy1">
                  <span>@lang('admin.contactanosco')</span>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="section">
                      <label class="field prepend-icon">
                        <input type="text" name="inombre" id="inombre" class="gui-input" placeholder="@lang('admin.escrinombreco')" required>
                        <label for="inombre" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="section">
                      <label class="field prepend-icon">
                        <input type="email" name="iemail" id="iemail" class="gui-input" placeholder="@lang('admin.escriemailco')" required>
                        <label for="email" class="field-icon">
                          <i class="fa fa-envelope"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="section">
                      <label class="field prepend-icon">
                        <input type="text" name="iasunto" id="iasunto" class="gui-input" placeholder="@lang('admin.escriasuntoco')" required>
                        <label for="iasunto" class="field-icon">
                         <i class="fa fa-globe"></i>
                        </label>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Text Areas -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="section">
                      <label class="field prepend-icon">
                        <textarea class="gui-textarea" id="imensaje" name="imensaje" placeholder="@lang('admin.escrimensajeco')" required></textarea>
                        <label for="imensaje" class="field-icon">
                          <i class="fa fa-comments"></i>
                        </label>

                      </label>
                    </div>
                  </div>
                </div>
                <div class="section-divider mv20" id="spy3">
                  <span id="botonw"><button class="btn btn-primary">@lang('admin.btnenviarco')</button></span>
                  <span id="imgw" style="display:none;"><img src="{{ asset('img/cargando.gif') }}" width="40" height="40"></img></span>
                </div>
              </form>
            </div>

            <center style="display:none;"><img src="{{ asset('img/LogoVertical.png')}}" alt="" width="100" height="100"></center>
          </div>
        </div>
      </div>
    </div>

  </section>
   @endsection
   @section('js')
     <script src="vendor/plugins/ladda/ladda.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Init Ladda Plugin on buttons
    Ladda.bind('.ladda-button', {
      timeout: 2000
    });

    // Bind progress buttons and simulate loading progress. Note: Button still requires ".ladda-button" class.
    Ladda.bind('.progress-button', {
      callback: function(instance) {
        var progress = 0;
        var interval = setInterval(function() {
          progress = Math.min(progress + Math.random() * 0.1, 1);
          instance.setProgress(progress);

          if (progress === 1) {
            instance.stop();
            clearInterval(interval);
          }
        }, 200);
      }
    });


      $("#contacto").on('submit',function(e) {
        e.preventDefault();

        var formData = new FormData($("#contacto")[0]);




        $.ajax({
            url:'contactof',
            type:'POST',
            data:formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend:function()
            {
              $("#botonw").hide();
              $("#imgw").show();
            },
            success:function(response)
            {
              $("#imgw").hide();
              $("#botonw").show();
               mensaje('Mensaje enviado correctamente.','success');
              $("#inombre").val('');
              $("#iemail").val('');
              $("#iasunto").val('');
              $("#imensaje").val('');
            },
            error:function()
            {
              mensaje('Ah ocurrido un problea, Intentelo mas tarde.','danger');
            }
        });

      });
  });

</script>
   @endsection
