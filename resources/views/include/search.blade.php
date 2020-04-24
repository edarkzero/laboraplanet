

  @if(Auth::guest())
      <div class="slider-wrap" style="height: 550px;width: 100%">
    <ul class="rslides" >
      <li><img src="img/edit/1.jpg" alt="" style="height: 200px"></li>
      <li><img src="img/edit/2.jpg" alt="" style="height: 200px"></li>
      <li><img src="img/edit/3.jpg" alt="" style="height: 200px"></li>
    </ul>
    <div class="slider-container">

        <div class="row" id="box">
            <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <form action="buscar" method='POST' id="form-buscar">

                    {{ @csrf_field() }}
                <div class="" style="border: none;">

                <div class="row">

                  @if(Auth::guest())
                 <center><h2 style="color: white;font-size: 18px">@lang('admin.buscar')</h2>
                 <p style="color: white;font-size: 15px" class="lead" id="cambia">@lang('traduccion1.sub1search')</p></center>

                 <script type="text/javascript">

    var text = ["Trabaja en remoto de forma independiente. Autoempleate!!. Consigue empresas cliente a nivel global!!", "Transforma tus ideas en realidad, ingeniosos colaboradores, estan listo para ayudarte..." ];
    var counter = 0;
    var elem = document.getElementById("cambia");

    setInterval(change, 3000);

    function change() {
     elem.innerHTML = text[counter];
        counter++;
        if(counter >= text.length) { counter = 0; }
    }

    // var text2 = ["Encuentra y aplica a los mejores requerimientos","Encuentra pproyectos y talentos..."];
    // var counter2 = 0;
    // var elem2 = document.getElementById("txtbusqueda").placeholder;


    // function change2() {
    //   elem2.innerHTML = text[counter2];
    //   counter2++;
    //   if(counter2 >= text.length) { counter2 = 0; }
    // }



                 </script>



                  @else

                        <?php
                        $nombre_usu = Auth::user()->razon_social;

                         if($nombre_usu == null || $nombre_usu == "")
                          {
                              $nombre_usu = Auth::user()->nombres." ". Auth::user()->apellidos;
                          }
                         else
                          {
                              $nombre_usu = $nombre_usu;
                          }

                          $nombre_usu = Auth::user()->razon_social;


                        ?>
                  <center><span style="font-size: 25px;color: red"> ¡ @lang('admin.bienvenidoinic') {{ $nombre_usu }}   <img src="img/feliz.png" width="30" height="30"> ! </span></center>
                  <br/>
                  @endif



                <div class="col-md-12" style="display: block;">

                                                        <div class="admin-form theme-primary" style="width:47%;height: 35px;float: left;border-radius: 0px 0px 0px 0px;">
                          <label class="field append-icon" id="borratodo">
                            <input type="text" id="txtbusqueda" name="txtbusqueda"  class="gui-input"  style="height: 35px;border-radius: 0px 0px 0px 0px;" required placeholder="Encuentra y aplica a los mejores requerimientos">
                 <script type="text/javascript">

    var text2 = ["Encuentra y aplica a los mejores requerimientos", "Encuentra requerimientos y talentos..."];
    var counter2 = 0;


     setInterval(change2, 3000);

    function change2() {
      $("#txtbusqueda").attr('placeholder',text2[counter2]);
      counter2++;
      if(counter2 >= text2.length) { counter2 = 0; }
    }



                 </script>





                            <span class="field-icon" >
                              <i class="fa fa-times"></i>
                            </span>
                          </label>
                        </div>

                      <select class="form-control" id="cbx_tipo" name='cbx_tipo' style="width: 31%;">

                          <option value="" >@lang('admin.cbxtipobusqueda')</option>
                          <option value="1">@lang('admin.cbxtbv1')</option>
                          <option value="2">@lang('admin.cbxtbv2')</option>
                      </select>

                  <div class="btn-group" style="width:20%">
                      <button class="btn btn-system" type="button" id="procesar" style="height: 35px;font-size:13px;width:50%">
                        <i class="fa fa-microphone-slash" id="icon"></i>
                      </button>
                      <button  class="btn btn-system" id="buscar" style="height: 35px;font-size:13px;width:50%">
                        <i class="fa fa-search"></i>
                      </button>
                  </div>

                  <br/><br/>
                </div>
                {{-- <div class="col-md-1"></div> --}}
                  </div>
                </div>
                </form>


        </div>
        <div class="col-md-1"></div>
        </div>
      </div>


      <br/><br/>

      <!--DESDE AQUI -->
      {{-- <div class="container">
             <div class="row" id="empujar" style="position: static;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                     <img src="{{ asset('img/PORTADAA.jpg') }}" style="width: 100%; height: 343px;background-repeat: no-repeat;" />
                  </div>

                  <div class="col-md-5">
                      <div class="row">
                        <div class="col-md-12" align="center">
                            <div class=" panel-system" >
                                <div class="panel-heading">
                                    <a href="{{ route('register') }}" class="panel-title"  style="padding: -35px">@lang('traduccion1.sub2search')  </a>
                                </div>
                                <div class="panel">
                                    <p style="font-size: 13px;">@lang('traduccion1.sub3search')</p>
                                    <a href="{{ route('register') }}" class="btn btn-system"> @lang('traduccion1.sub4search') </a>
                                    <br/><br/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" align="center">
                            <div class="panel-system">
                                <div class="panel-heading" >
                                    <a href="{{ route('register') }}" class="panel-title"> @lang('traduccion1.sub5search') </a>
                                </div>
                                <div class="panel">
                                    <p style="font-size: 13px">@lang('traduccion1.sub6search')</p>
                                    <a href="{{ route('register') }}" class="btn btn-system"> @lang('traduccion1.sub7search') </a>
                                    <br/><br/>
                                <div id="destacados"></div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-1"></div>
             </div>
      </div> --}}

      <div class="row" id="empujar" style="position: static;">
                  <div class="col-xs-2" id="el1"></div>
                  <div class="col-xs-4" id="ca1" align="center">
                        <a href="publicar_trabajo" style="text-decoration: none;">
                      <div class="panel panel-system" style="border: solid 5px ;">

                        <div class="panel-heading">

              <label class="panel-title" id="t1x">PUBLICAR REQUERIMIENTO</label>

        </div>
        <div class="panel-body" style="height: 180px;">

          <img src="img/pproyecto_.png" class="category" id="publicapro" style="width: 250px;height: 100px">
          <br><br>
          <p style="font-size: 13px;">Selecciona y contrata al mejor colaborador.</p>

        </div>
      </div>
      </a>

      </div>

        <div class="col-xs-4" align="center" id="ca2">
            <a href="buscar_trabajo" style="text-decoration: none;">
         <div class="panel panel-system" style="border: solid 5px;border-color: #2d9a7f;">
        <div class="panel-heading">

          <label href="buscar_trabajo" id="t2x" class="panel-title" style="padding: -35px;font-weight:bold;color: white;"> BUSCO TRABAJO</label>

        </div>

        <div class="panel-body" style="height: 180px;">

          <img src="img/mamabebe.jpg" class="category" id="buscotraba" style="width: 250px;height: 100px">
          <br><br>

                    <p style="font-size: 13px" id="ctxt1">Demuestra tu talento al mundo registra tu perfil</p>

           <div id="destacados"></div>

        </div>

      </div>
        </a>
      </div>
<div class="col-xs-2" id="el2"></div>


       </div>

    </div>
  </div>

  @else

   <div class="slider-wrap" style="height: 550px;width: 100%">
    <ul class="rslides">
      <li><img src="img/edit/1.jpg" alt="" style="height: 350px"></li>
      <li><img src="img/edit/1.jpg" alt="" style="height: 350px"></li>
      <li><img src="img/edit/1.jpg" alt="" style="height: 350px"></li>
    </ul>
    <div class="slider-container">
      <div>
        <div class="col-md-2"></div>
        <div class="col-md-8" >

           <div >
           <div class="col-md-1">

            </div>

            <div class="col-md-10" style="padding-left:0px;padding-right:0px;">

                <form action="buscar" method='POST' id="form-buscar">

                    {{ @csrf_field() }}
                <div class="" style="border: none;">

                <div>

                  @if(Auth::guest())
                 <center><h2 style="color: white;font-size: 18px">@lang('admin.buscar')</h2>
                 <p style="color: white;font-size: 15px" class="lead">@lang('admin.tdb2')</p></center>
                  @else
                        <?php
                        $tpu = Auth::user()->tpu;
                        if($tpu=="E"){
                            $nombre_usu = Auth::user()->razon_social;
                        }else{
                            $nombre_usu = Auth::user()->nombres." ". Auth::user()->apellidos;
                        }

                        //   $nombre_usu = Auth::user()->razon_social;


                        ?>
                  <center id="row"><span style="font-size: 25px;color: red"> ¡ @lang('admin.bienvenidoinic') {{ $nombre_usu }}   <img src="img/feliz.png" width="30" height="30">   ! </span></center>
                  <br/>
                  @endif



                <div class="col-md-12" style="display: block;border-left:20px">

                          <!--<div class="admin-form theme-primary" id="movil3" style="width:565px;height: 35px;float: left;border-radius: 0px 0px 0px 0px;">-->
                                                        <div class="admin-form theme-primary" style="width:47%;height: 35px;float: left;border-radius: 0px 0px 0px 0px;">

                          <label class="field append-icon" id="borratodo">
                            <input type="text" id="txtbusqueda" name="txtbusqueda"  class="gui-input"  style="height: 35px;border-radius: 0px 0px 0px 0px;padding-right:25px" required placeholder="Encuentra y aplica a los mejores requerimientos">
                            <span class="field-icon" style="width:30px;line-height:35px">
                              <i class="fa fa-times"></i>
                            </span>
                          </label>
                        </div>
                            <select class="form-control" id="cbx_tipo" name='cbx_tipo' style="width: 33%;font-size:10px;">
                          <option value="" >@lang('admin.cbxtipobusqueda')</option>
                          <option value="1">@lang('traduccion1.sub8search')</option>
                          <option value="2">@lang('admin.cbxtbv2')</option>
                      </select>
                     <script type="text/javascript">
                        @if($tpu=="E")
                          document.getElementById('cbx_tipo').value=2;
                          document.getElementById('txtbusqueda').setAttribute('placeholder',"Busca los mejores trabajadores");
                                                                 //setAttribute
                        @else
                                                 // document.getElementById('txtbusqueda').setAttribute('placeholder',"");
                          document.getElementById('cbx_tipo').value=1;
                        @endif
                      </script>

                  <div class="btn-group" style="width:18%">
                      <button class="btn btn-system" type="button" id="procesar" style="height: 35px;font-size:13px;width:50%">
                        <i class="fa fa-microphone-slash" id="icon"></i>
                      </button>
                      <button  class="btn btn-system" id="buscar" style="height: 35px;font-size:13px;width:50%">
                        <i class="fa fa-search"></i>
                      </button>
                  </div>


                  <br/><br/>
                </div>

        <div class="row" id="empujar" style="position: static;">

            <div class="col-xs-6" align="center">
                  <a href="publicar_trabajo" style="text-decoration: none;">
                <div class="panel panel-system" style="border: solid 5px @if($tpu=="E")

                                            @endif;">

                  <div class="panel-heading" @if($tpu=="E")

                                            @endif>

        <label class="panel-title" id="t1x" >   @lang('admin.publicarproyecto')</label>

  </div>
  <div class="panel-body" style="height: 250px;">
    <p style="font-size: 13px;">@lang('admin.txtpublicpro2')</p>
    <br/>
    <img src="img/pproyecto_.png" class="category" id="publicapro" style="width: 190px">
    <br/><br/><br/>
  </div>
</div>
</a>

</div>

  <div class="col-xs-6" align="center">
      <a href="buscar_trabajo" style="text-decoration: none;">
   <div class="panel panel-system" style="border: solid 5px ">
  <div class="panel-heading" >

    <label href="buscar_trabajo" id="t2x" class="panel-title"  style="padding: -35px;font-weight:bold;color: white;"> @lang('admin.buscotrabajo')</label>

  </div>

  <div class="panel-body" style="height: 250px;">

    <p style="font-size: 13px">@lang('admin.txtbuscotra2')</p>
    <br/>
    <img src="img/mamabebe.jpg" class="category"  id="buscotraba" style="width: 190px">
    <br/><br/>
     <div id="destacados"></div>

  </div>

</div>
  </a>
</div>


<div class="col-md-2"></div>
 </div>
                <div class="col-md-1"></div>
                  </div>
                </div>
                </form>


        </div>
        <div class="col-md-1"></div>
      </div>



        </div>
        <div class="col-md-2"></div>
      </div>


    </div>


  </div>




  @endif
