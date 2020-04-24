@extends('layouts.admin2')

@section('css')
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="shortcut icon" href="assets/img/favicon.ico">

<style type="text/css">
	#todo
	{
		left: 550px;
	}
	#ver
	{
		left: 120px;
	}

</style>

@endsection


@section('contenido')
</br>
</br>
</br>
</br>
<!-- Login 1 -->
              <div class="admin-form theme-success tab-pane mw800" id="login1" role="tabpanel">
                <div class="panel panel-success heading-border" id="todo">
                  <div class="panel-heading">
                    <span class="panel-title">
                    <a href="http://200.0.0.79/labora/public/buscar_trabajo"><i class="fa fa-sign-in"></i></a>Necesitas Iniciar Sesion </span>
                  </div>
                  <!-- end .form-header section -->

                  <form method="post" action="/" id="form-login1">
                    <div class="panel-body p25 pt10">
                      <div class="section-divider mt30 mb40">
                        <span>Opciones</span>
                      </div>
                      <!-- .section-divider -->

                      <div class="section row" id="ver">
                        <div class="col-md-4">
                          <a href="http://200.0.0.79/labora/public/register" class="button btn-social facebook span-left mr5 btn-block">
                            <span>
                              <i class="fa fa-align-left holder-icon"></i>
                            </span>REGISTRARTE</a>
                        </div>
                        <div class="col-md-4">
                          <a href="http://200.0.0.79/labora/public/login" class="button btn-social twitter span-left mr5 btn-block">
                            <span>
                              <i class="fa fa-user pr5"></i>
                            </span>INICIAR</a>
                        </div>
                       
                      </div>
                      </div>
                  </form>
                </div>
                <!-- end .panel-->
              </div>
              <!-- end: .admin-form -->


</br>
</br>





@endsection