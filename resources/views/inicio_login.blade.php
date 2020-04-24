@extends('layouts.admin2')
@section('css')

 <link rel="stylesheet" type="text/css" href="vendor/plugins/slick/slick.css">
<style type="text/css">


[class^='select2'] {
  border-radius: 0px !important;
}


.select2-container .select2-selection--single {
    height: 35.5px !important;
}


.select2-results__options{
        font-size:12px !important;
 }

.select2-selection {
  -webkit-box-shadow: 0;
  box-shadow: 0;
  background-color: #fff;
  border: 0;
  border-radius: 0;
  color: #555555;
  font-size: 14px;
  outline: 0;
  min-height:35px;
  text-align: left;
}

.select2-selection__rendered {
  margin: -5px;
}

.select2-selection__arrow {
  margin: -5px;
}

 /*===============================================
  Skin Toolbox
================================================= */
#skin-toolbox {
  z-index: 999;
  overflow: visible !important;
  position: fixed;
  top: 200px;
  right: -230px;
  width: 230px;
  -webkit-transition: right 0.1s ease-in-out;
  -moz-transition: right 0.1s ease-in-out;
  transition: right 0.1s ease-in-out;
}
#skin-toolbox.toolbox-open {
  right: 0;
}

#skin-toolbox .panel-heading {
  cursor: pointer;
  margin-right: 30px;
  border: 1px solid #DDD;
  width: 274px;
  height: 47px;
  line-height: 42px;
  right: 44px;
  font-size: 14px;
}
#skin-toolbox .panel-heading .panel-title {
  padding-left: 40px;
}
#skin-toolbox .panel-body {
  border: 1px solid #DDD;
  border-top: 0;
  padding: 23px;
}
#skin-toolbox .panel-icon {
  font-size: 22px;
  padding-right: 20px;
  padding-left: 6px;
}

.box-icon {
    background-color: rgba(104,103,102,0.8);
    border-radius: 50%;
    display: table;
    height: 100px;
    margin: 0 auto;
    width: 100px;
    margin-top: -61px;
}
.box-icon span {
    color: #fff;
  margin-top: 10px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}
    .col-md-3 u{
        padding: 20px
    }
    .tipo{
        font-size: 20px
    }
    .img{
        display: block;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        border: rgb(231,231,231) 3px solid;
    }
    .img:hover{
-moz-transform: scale(1) rotate(360deg);
-webkit-transform: scale(1) rotate(360deg);
-o-transform: scale(1) rotate(360deg);
-ms-transform: scale(1) rotate(360deg);
transform: scale(1) rotate(360deg);
  -webkit-transition: 0.4s all linear;
          transition: 0.4s all linear;
  color:#FCED23;
    }
    .im{
        padding: 15%;
        height:100%;
        width: 100%
    }

</style>

@endsection
@section('contenido')

@include('include.search')

<div class="container" id="">
    <div class="row">
      <div class="col-md-1">

      </div>
      <div class="col-md-10">

          <div class="panel panel-system">
              <div class="panel-heading" align="center">
                <span class="panel-title"  id="eresempre">@lang('traduccion2.txteresmpreindex')</span>
              </div>
                <div class="">
                  <div class="row">
{{--                     <div class="col-md-1" id="foto_movil" style="background:url(img/proyectos_personalizados.PNG) no-repeat;height: 420px;width: 12px">

                    </div> --}}
                    <div class="col-md-12">
                      <img src="img/proyectos_personalizados.PNG" id="foto_movil" alt="Mi titulo de la imagen" style="height: 300px;float: left;">
                      {{-- <br/> --}}
                        <h3 style="text-align: center;font-size: 18px;color: #2e9e83;color: #000000;">@lang('admin.notepreocupesnoso')</h3>
                        {{-- <br/> --}}
                        <div style="text-align: left;font-size: 13px">
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto1')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto3')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('traduccion2.txtopcion31index')</p></b>
                        <b><p style="color: #000000;"><img src="img/icon-listo-30.png">&nbsp;@lang('admin.punto4')</p></b>
                        <br/>
                        <center><button style="width: 180px" id="solicita" type="button" class="btn active btn-system btn-block">
                          @lang('admin.btnnecesita')
                        </button></center>
                        <br/>
                        </div>
                    </div>
                  </div>

                </div>

          </div>

      </div>
      <div class="col-md-1">

      </div>
    </div>

</div>

 <div class="tray tray-center" style="padding-left: 20px" id="">
    <div class=" mw1200 center-block  animated fadeIn" style="padding-top: 30px;">
        <div class="admin-form theme-primary">
        	<div class="panel heading-border panel-primary">
            	<div class="panel-body bg-light">
            	    <br>
            	    <center>
            	    <div class="row">
            	        <div class="col-md-3 u"></div>
            	    	<!--<div class="col-md-2 u"><a href="trabajos"><div class="img"><img src="img/icon/trabajos.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic3')</span></div>-->
            	    	<div class="col-md-2 u"><a href="seguridad"><div class="img"><img src="img/icon/configuracion.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic4')</span></div>
                    <!--<div class="col-md-2 u"><a href="planes"><div class="img"><img src="img/icon/Planes.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic5')</span></div>-->
                    <div class="col-md-2 u"><a href="proyectos"><div class="img"><img src="img/icon/publicaciones.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic6')</span></div>
                    <!--<div class="col-md-2 u"><a href="certificar"><div class="img"><img src="img/icon/certificar.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic7')</span></div>-->
                    <div class="col-md-2 u"><a href="javascript:void(0)" class="salir"><div class="img"><img src="img/icon/invitar.png" class="im"></div></a><br><span class="tipo">@lang('admin.opcinic8')</span>
                    <div class="col-md-3 u"></div>
            	    </div>
            	    </div>
            		</center>
            	</div>
        	</div>
    	</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      //var xd = '';
      // alert("La resoluci¨®n de tu pantalla es: " + screen.width + " x " + screen.height)
      if(screen.width <= 500)
      {
        $("#publicapro").css({"width":"120px"});
        $("#t1x").css({"font-size":"9px"});
        $("#buscotraba").css({"width":"120px"});
        $("#t2x").css({"font-size":"9px"})

        //var xd = 1
      }
      else
      {
        $("#publicapro").css({"width":"190px"});
        $("#buscotraba").css({"width":"190px"});

      }




   $("#cbx_tipo").select2({
      placeholder: "-- Tipo de Busqueda --",
       minimumResultsForSearch: -1
    });

    $("#txtbusqueda").keypress(function(e) {

       var code = (e.keyCode ? e.keyCode : e.which);
      if(code== 13) {

          $("#cbx_tipo").focus();
          $("#cbx_tipo").select2('open');


      }
    });



$("#cbx_tipo").on('change',function(){
   $("#buscar").click();
});


  $("#cbx_tipo").on('change',function() {
    var op = $("#cbx_tipo option:selected").val();

    if(op == 1)
    {
      $("#txtbusqueda").attr('placeholder','Encuentra trabajo...');
    }
    if(op == 2)
    {
      $("#txtbusqueda").attr('placeholder','Encuentra colaboradores...');
    }
    if(op == "")
    {
      $("#txtbusqueda").attr('placeholder','Encuentra proyectos y talentos...');
    }

  });


  $("#publicapro").on('click',function() {
     location.href='publicar_trabajo';
  });

  $("#buscotraba").on('click',function() {
     location.href='buscar_trabajo';
  });


    $("#form-buscar").submit(function(e){
    var txtbusqueda = $("#txtbusqueda").val();
    var valcombo = $("#cbx_tipo").val();

    if(valcombo == "")
    {
      e.preventDefault();
    }
    else
    { e.submit();
      console.log('SI HA SELECCIONADO');
     }


   });


    });
</script>
@endsection
