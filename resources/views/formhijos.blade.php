@extends('layouts.admin2')

@section('css')
<link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
<style>
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/estees.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
@endsection

@section('contenido')
  <br/>

<div class="loader" style="display: none"></div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="admin-form theme-danger" id="register1" role="tabpanel">
                      <div class="panel panel-danger heading-border">
                        <div class="panel-heading">
                          <span class="panel-title">
                            <i class="fa fa-pencil-square"></i>Mejora la interrelacion con tus hijos, trabaja al mismo tiempo que estan cerca tuyo
                          </span>
                        </div>
                        <!-- end .form-header section -->

                        <form method="post" action="" id="formhijos" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          <div class="panel-body p25">
                            <label>Accede a todos los beneficios del plan "Laboral" por 6 largos meses de manera gratuita.</label><br/>
                            <label>* Solicitud de beneficios para personas con niños menores de 11 años.</label> <br/><br/>
                            <label for="names" class="field-label">Nombre de Usuario</label>
                            <div class="section row">
                              <div class="col-md-6">
                                <label for="nombre" class="field prepend-icon">
                                  <input type="text" name="nombre" id="nombre" required class="gui-input" placeholder="..." value="{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}">
                                  <label for="nombre" class="field-icon">
                                    <i class="fa fa-user"></i>
                                  </label>
                                </label>
                              </div>
                            </div>


                            <label for="birthday" class="field-label">N° de Hijos</label>
                            <div class="section row">
                              <div class="col-md-6">
                                <?php
                                $array1 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
                                ?>
                                  <select id="cbohijos" name="cbohijos" required class="form-control select2">
                                    <option></option>
                                    <?php
                                      foreach ($array1 as $key) {
                                        echo "<option value='".$key."'>$key</option>";
                                      }
                                     ?>
                                  </select>

                              </div>
                            </div>

                            <label class="field-label">Adjuntar identificacion del titular y cualquier otro documento que valide recientemente que los niños existen y estan bajo custodia del titular.</label>
                            <div class="section row">
                              <div class="col-md-6">
                                <label class="field prepend-icon append-button file">
                                    <span class="button btn-danger">Elija el archivo</span>
                                          <input type="file" class="gui-file" required name="file1" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                                  <input type="text" class="gui-input" id="uploader1" placeholder="Identificacion titular.">
                                                        <label class="field-icon">
                                                            <i class="fa fa-upload"></i>
                                                        </label>
                                </label>
                                <br/><br/>
                              </div>
                              <div class="col-md-6">
                                <label class="field prepend-icon file">
                                                            <span class="button btn-danger">Elija el archivo</span>
                                                            <input type="file" required class="gui-file" name="file2" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                                                            <input type="text" class="gui-input" id="uploader2" placeholder="Documento sustentario de la existencia del o los niños.">
                                                            <label class="field-icon">
                                                              <i class="fa fa-upload"></i>
                                                            </label>
                                                          </label>
                              </div>
                            </div>

                            <label for="" class="field-label">Telefono</label>
                            <div class="section row">
                              <div class="col-md-6">
                                <label for="telefono" class="field prepend-icon">
                                  <input type="text" name="telefono" required id="telefono" class="gui-input" placeholder="...">
                                  <label for="telefono" class="field-icon">
                                    <i class="fa fa-phone"></i>
                                  </label>
                                </label>
                              </div>
                            </div>



                          </div>

                          <div class="panel-footer">
                            <button type="submit" class="button btn-danger">GUARDAR</button>
                          </div>

                        </form>
                      </div>

                    </div>

    </div>
    <div class="col-md-2"></div>
  </div>
@endsection

@section('js')
<script type="text/javascript" src="select2/select2.min.js"></script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(".select2").select2({
          placeholder: "Seleccione...",
      });

      $("#formhijos").submit(function(e) {
          e.preventDefault();

          var formData = new FormData($("#formhijos")[0]);

          $.ajax({
            url:'enviaform',
            type:'POST',
            dataType:'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            beforeSend()
            {
              $(".loader").show();
            },
            success:function(response)
            {
              $(".loader").hide();
              $("#file1").val("");
              $("#uploader1").val("");
              $("#file2").val("");
              $("#uploader2").val("");
              $("#telefono").val("");

              $("#cbohijos").val("").trigger("change");
              mensaje('Tus datos serán revisados y de ser el caso serán aprobados en un plazo máximo de 48 horas','success');

            },
            error:function()
            {
              mensaje('Ocurrio un error. Intentelo mas tarde.','danger');
            }
          });

      });

    });
</script>
@endsection
