
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="select2/select2.min.css"> --}}
    <link rel="stylesheet" type="text/css" href=" {{ asset('vendor/plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jQuery-plugin-progressbar.css') }}">

    <!--DESDE AQUI LLEVE YO -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/tagmanager/tagmanager.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/ladda/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/zocial/zocial.css') }}">


    <!-- FIN -->
    <style type="text/css">
        p  .NumberLevel {
            font-size: 6em;
            font-weight: 600;
            margin:0px;
            padding:0px;
            color:#FFEC44;
            text-align: left;
            /*margin-top:-15px;*/
        }

        /*  estrellas */

        #este {
            color: #C9CB33;
        }

        /* FIN*/

        p:hover .NumberLevel {
            -moz-transform: scale(1.5) rotate(360deg);
            -webkit-transform: scale(1.5) rotate(360deg);
            -o-transform: scale(1.5) rotate(360deg);
            -ms-transform: scale(1.5) rotate(360deg);
            transform: scale(1.5) rotate(360deg);
            -webkit-transition: 0.4s all linear;
            transition: 0.4s all linear;
            color:#FCED23;
        }

        .upload-button{
            background-color:#ba2323;
            padding:10px;
            position:relative;
            font-family: 'Open Sans', sans-serif;
            font-size:12px;
            text-decoration:none;
            color:#fff;
            border: solid 1px #831212;
            background-image: linear-gradient(bottom, rgb(171,27,27) 0%, rgb(212,51,51) 100%);
            border-radius: 5px;
        }

        .upload-button:hover{
            padding-bottom:9px;
            padding-left:10px;
            padding-right:10px;
            padding-top:11px;
            top:1px;
            background-image: linear-gradient(bottom, rgb(171,27,27) 100%, rgb(212,51,51) 0%);
        }


        .upload-button2{
            background-color:blue;
            padding:10px;
            position:relative;
            font-family: 'Open Sans', sans-serif;
            font-size:12px;
            text-decoration:none;
            color:#fff;
            border: solid 1px blue;
            background-image: linear-gradient(bottom, rgb(171,27,27) 0%, rgb(212,51,51) 100%);
            border-radius: 5px;
        }

        .upload-button2:hover{
            padding-bottom:9px;
            padding-left:10px;
            padding-right:10px;
            padding-top:11px;
            top:1px;
            background-image: linear-gradient(bottom, rgb(171,27,27) 100%, rgb(212,51,51) 0%);
        }
        .error{

        }

        .image-upload > input
        {
            display: none;
        }

        .image-upload img
        {
            width: 165;
            cursor: pointer;
        }



        /*===============================================
        Skin Toolbox
      ================================================= */
        #skin-toolbox {
            z-index: 999;
            overflow: visible !important;
            position: fixed;
            top: 160px;
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


    </style>

    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/globalize/globalize.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/charts/highcharts.js') }}"></script>
    <script src="{{ asset('vendor/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('vendor/plugins/circles/circles.js') }}"></script>
    <script src="{{ asset('js/laborajs/perfil.js') }}"></script>
    <script src="{{ asset('vendor/plugins/fileupload/fileupload.js') }}"></script>

    <!-- DESDE AQUI OTRAVES -->
    <script src="{{ asset('vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

    <!-- Bootstrap Maxlength plugin -->
    <script src="{{ asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>


    <!-- Typeahead Plugin -->
    <script src="{{ asset('vendor/plugins/typeahead/typeahead.bundle.min.js') }}"></script>

    <!-- TagManager Plugin -->
    <script src="{{ asset('vendor/plugins/tagmanager/tagmanager.js') }}"></script>

    <!-- DateRange Plugin -->
    <script src="{{ asset('vendor/plugins/daterange/daterangepicker.min.js') }}"></script>

    <!-- DateTime Plugin -->
    <script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- BS Colorpicker Plugin -->
    <script src="{{ asset('vendor/plugins/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

    <!-- MaskedInput Plugin -->
    <script src="{{ asset('vendor/plugins/jquerymask/jquery.maskedinput.min.js') }}"></script>
    <!-- FIN -->
    <script src="{{asset('js/starrr.js')}}"></script>



    <!-- Tagmanager JS -->
    <script src="{{ asset('vendor/plugins/tagsinput/tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/jQuery-plugin-progressbar.js') }}"></script>

    <script type="text/javascript">


        $(".clasificacion").find("input").change(function(){
            var valor = $(this).val()
            $(".clasificacion").find("input").removeClass("activo")
            $(".clasificacion").find("input").each(function(index){
                if(index+1<=valor){
                    $(this).addClass("activo")
                }

            })
        })

        $(".clasificacion").find("label").mouseover(function(){
            var valor = $(this).prev("input").val()
            $(".clasificacion").find("input").removeClass("activo")
            $(".clasificacion").find("input").each(function(index){
                if(index+1<=valor){
                    $(this).addClass("activo")
                }

            })
        })

        $('#puntuacion').starrr({
            rating:0,
            change:function(e,valor){
                $("#invi").val(valor);
            }
        });

        $('#puntuacione').starrr({
            rating:0,
            change:function(e,valor){
                $("#invi").val(valor);
            }
        });
        $('.estrellass').starrr({
            rating:3,
            change:function(e,valor){
                $("#invi").val(valor);
            }
        });


        var abierto = 0;
        $("#skin-toolbox").click(function(){
            if(abierto == 0)
            {
                abierto = 1;
                $('#skin-toolbox').addClass("toolbox-open");


            }
            else
            {
                abierto = 0;
                $("#skin-toolbox").removeClass("toolbox-open");
            }
        });





        $("#paisd").val('{{ Auth::user()->pais }}');
        $("#monedad").val('{{ Auth::user()->type_money }}');
        $("#paise").val('{{ Auth::user()->pais_empresa }}');
        //   $("#codigopd").val('{{ Auth::user()->postalCode }}');

        var codigopostal = '{{ Auth::user()->postalCode }}';
        if (codigopostal == "")
        {

        }
        else
        {
            $("#codigopd").val(codigopostal);
        }

        $(".progress-bar1").loading();
        $('input').on('click', function () {
            $(".progress-bar1").loading();
        });


    </script>

    <?php
    /////////////////////////////////////////////
    $fotousu = $user['imagen'];
    $nombreusu = $user['nombres'];
    $apellidousu = $user['apellidos'];
    $profesionusu = $user['profesion'];
    $telefonousu = $user['telfono'];
    $usu_usu = $user['usuario'];
    $documentousu = $user['documento'];
    $precio_horausu = $user['precio_hora'];
    $direccion_usu = $user['direccion'];
    $correo_usu = $user['correo'];
    $perfi_usu = $user['perfil'];
    $ver_dni = $user['ver_dni'];
    $urllinkedin = $user['urllinkedin'];
    $unosubcategoria = $user['unosubcategoria'];
    $dossubcategoria = $user['dossubcategoria'];
    $tressubcategoria = $user['tressubcategoria'];
    ?>




    <section id="content"  class="animated fadeIn">

        <div class="page-heading">
            <div class="row">
                <div class="col-md-8">
                    <div class="media clearfix" >
                        <br/>

                        <div class="media-left pr30" >
                            <img class="media-object mw150" src="{{ asset($fotousu)}}" id="img" alt="..." width="165" height="165">
                        </div>



                        <div class="media-body va-m" ><h2 class="media-heading" >{{ $nombreusu ." ".$apellidousu }} </h2>
                            <p class="lead" >{{ $perfi_usu }}</p>
                        </div>
                    </div>
                    <br/>
                </div>


                <div class="col-md-4">
                    <br/><br/>
                    <div class="row mb10" id="spy7">
                        <div class="col-md-6">
                            <div class="">
                                <div class="panel panel-tile text-center">
                                    <div class="panel-body bg-primary light">
                                        <!--<a href="javascript:void(0);" style="text-decoration: none;" class="fa fa-briefcase text-muted fs40 br60 bg-primary p10 ph15 mt5"></a>-->


                                        <h1 class="fs35 mbn" style="margin-top: 1px;">{{ $usuarios }}</h1>

                                        <h6 class="text-white">@lang('admin.txtproyectosaplicados')</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="panel panel-tile text-center">
                                    <div class="panel-body bg-info light">
                                        <!--<i class="fa fa-bar-chart-o text-muted fs40 br60 bg-info p10 ph15 mt5"></i>-->
                                        <h1 class="fs35 mbn" style="margin-top: 1px;">{{ $cont }}</h1>
                                        <h6 class="text-white">@lang('admin.txtproyectosrealizados')</h6>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>


        <div class="row" >
            <div class="col-md-12">
                <div class="panel">

                    <div class="">
                        <div class="tab-content pn br-n">
                            <div id="tab2_1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="admin-form theme-primary">
                                            <div class=" panel heading-border panel-primary">
                                                <div class="panel-body bg-light">


                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">
                                                            <div class="panel">
                                                                <div class="panel-heading" style="padding: 0px;">
                                                                    <label style="color: black;font-size: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('admin.ttitleprofesionoperfilab')</label>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <h3 style="margin: 0px; padding-bottom: 10px">@lang('admin.txtProfesion'):</h3>
                                                                        <div class="row">
                                                                            <div class="col-md-10">
                                                                                <div class="section">
                                                                                    <label class="field prepend-icon">
                                                                                        <input type="text" name="txtprofesion" id="txtprofesion" class="gui-input" placeholder="{{ ucwords($profesionusu) }}" style="margin-left: 13px;" disabled>
                                                                                        <b class="tooltip tip-right-bottom"><em> @lang('admin.placeaquiprofe') </em></b>
                                                                                        <label for="tooltip3" class="field-icon">
                                                                                            <i class="fa fa-user" style="margin-left: 20px;"></i>
                                                                                        </label>
                                                                                    </label>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <h3 style="margin: 0px; padding-bottom: 10px  ">@lang('traduccion1.sub1verperfil') :</h3>

                                                                        <div class="row">

                                                                            @if($unosubcategoria == null && $dossubcategoria == null && $tressubcategoria == null)
                                                                                <p style="color:red;">@lang('traduccion1.sub2verperfil')</p>
                                                                            @else

                                                                            @endif

                                                                            @if ($unosubcategoria == null || $unosubcategoria == " ")

                                                                            @else
                                                                                <div class="col-md-4" >
                                                                                    <div class="panel">
                                                                                        <div class="panel-heading" style="padding: 0px;">
                                                                                            <span> &nbsp; {{ $unosubcategoria }} </span>


                                                                                        </div>
                                                                                        <div class="panel-body ptn pbn p10">
                                                                                            <ol class="timeline-list">
                                                                                                <?php
                                                                                                $conocimi = $user['unoconocimiento'];
                                                                                                $porciones = explode(",", $conocimi);
                                                                                                ?>

                                                                                                @foreach($porciones as $por)
                                                                                                    <li class="timeline-item">
                                                                                                        <div class="timeline-icon bg-dark light">
                                                                                                            <span class="fa fa-tags"></span>
                                                                                                        </div>
                                                                                                        <div class="timeline-desc">
                                                                                                            <b>{{ $por }}</b>
                                                                                                        </div>

                                                                                                    </li>
                                                                                                @endforeach

                                                                                            </ol>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            @endif

                                                                            @if ($dossubcategoria == null || $dossubcategoria == " ")

                                                                            @else
                                                                                <div class="col-md-4" >
                                                                                    <div class="panel">
                                                                                        <div class="panel-heading" style="padding: 0px;">
                                                                                            <span> &nbsp; {{ $dossubcategoria }} </span>


                                                                                        </div>
                                                                                        <div class="panel-body ptn pbn p10">
                                                                                            <ol class="timeline-list">
                                                                                                <?php
                                                                                                $conocimi = $user['dosconocimiento'];
                                                                                                $porciones = explode(",", $conocimi);
                                                                                                ?>

                                                                                                @foreach($porciones as $por)
                                                                                                    <li class="timeline-item">
                                                                                                        <div class="timeline-icon bg-dark light">
                                                                                                            <span class="fa fa-tags"></span>
                                                                                                        </div>
                                                                                                        <div class="timeline-desc">
                                                                                                            <b>{{ $por }}</b>
                                                                                                        </div>

                                                                                                    </li>
                                                                                                @endforeach

                                                                                            </ol>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            @endif

                                                                            @if ($tressubcategoria == null || $tressubcategoria == " ")

                                                                            @else
                                                                                <div class="col-md-4" >
                                                                                    <div class="panel">
                                                                                        <div class="panel-heading" style="padding: 0px;">
                                                                                            <span> &nbsp; {{ $tressubcategoria }} </span>


                                                                                        </div>
                                                                                        <div class="panel-body ptn pbn p10">
                                                                                            <ol class="timeline-list">
                                                                                                <?php
                                                                                                $conocimi = $user['tresconocimiento'];
                                                                                                $porciones = explode(",", $conocimi);
                                                                                                ?>

                                                                                                @foreach($porciones as $por)
                                                                                                    <li class="timeline-item">
                                                                                                        <div class="timeline-icon bg-dark light">
                                                                                                            <span class="fa fa-tags"></span>
                                                                                                        </div>
                                                                                                        <div class="timeline-desc">
                                                                                                            <b>{{ $por }}</b>
                                                                                                        </div>

                                                                                                    </li>
                                                                                                @endforeach

                                                                                            </ol>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            @endif


                                                                        </div>



                                                                    </div>
                                                                    <div id="habilidad" style="display:none;">

                                                                        <?php $var = 0;?>
                                                                        @foreach($habilidad as $value)
                                                                            @if($var!=$value->id_category)
                                                                                @if($var!=0)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <?php $var=$value->id_category ?>
                                                    <div class="col-sm-6">
                                                        <div class="panel-group">
                                                            <div class="panel">
                                                                <div class="panel-heading" style="padding: 0px;">
                                                                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{ $var }}" aria-expanded="false" style="color: #37bc9b">
                                                                        {{ $value->description }}
                                                                    </a>
                                                                </div>
                                                                <div id="{{ $var }}" class="panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                                                                    <div class="panel-body" id="bod_{{ $value->id_category }}">

                                                                        <div> . {{ $value->ability }} <a href="javascript:void(0)" class="btn-eliminar-h" data-co="{{ $value->id_ability }}"></a><br></div>
                                                                        @else

                                                                            <div>. {{ $value->ability }} <a href="javascript:void(0)" class="btn-eliminar-h"  data-co="{{ $value->id_ability }}"></a><br></div>
                                                                        @endif
                                                                        @endforeach
                                                                        @if($var!=0)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>



                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="section-divider mv40" id="spy2">
                                    <span>@lang('admin.titledatospersonalespf')</span>
                                </div>


                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="nombred" id="nombred" class="gui-input" placeholder="{{ $nombreusu }}"   disabled>
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="apellidosd" id="apellidosd" class="gui-input" placeholder="{{ $apellidousu }}"  disabled>
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="section">

                                            <select  class="form-control" style="width: 100%" disabled >
                                                <?php
                                                $paisll = explode("-",$pais);
                                                ?>
                                                <option value="{{ $paisll[0] }}">{{ $paisll[1] }}</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="section">
                                            <label class="field select">
                                                <select id="codigopd" name="codigopd" disabled>
                                                    <option value="">@lang('admin.placehcbocodigopostalpf')</option>
                                                    @foreach($postal as $value)

                                                        <?php
                                                        $seleccionado = "";
                                                        if(strtoupper($value->codigo_pais) == $llevaip)
                                                        {
                                                            $seleccionado = "selected";
                                                        }
                                                        ?>

                                                        <option value="{{ $value->id_postal_code }}" {!! $seleccionado !!} > + {{ $value->code_postal }}</option>
                                                    @endforeach
                                                </select>
                                                <i class="arrow double"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="telefonod" id="telefonod" class="gui-input" placeholder="{{ $telefonousu }}"  disabled>
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-phone"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="usuariod" id="usuariod" class="gui-input" placeholder="{{ $usu_usu }}"  disabled>
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">

                                        <div class="section">
                                            @if($ver_dni == 0)
                                                <label class="field prepend-icon">
                                                    <input type="text" name="usuariod" id="usuariod" class="gui-input" placeholder="*******" disabled>
                                                    <label for="tooltip3" class="field-icon">
                                                        <i class="fa fa-barcode"></i>
                                                    </label>
                                                </label>
                                            @else
                                                <label class="field prepend-icon">
                                                    <input type="text" name="usuariod" id="usuariod" class="gui-input" placeholder="{{ $documentousu }}" disabled>
                                                    <label for="tooltip3" class="field-icon">
                                                        <i class="fa fa-barcode"></i>
                                                    </label>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="section">
                                            <label class="field select">
                                                <label class="field select">
                                                    <input type="text" placeholder="USD" disabled class="gui-input">
                                                    <i class="arrow double"></i>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="preciohd" id="preciohd" class="gui-input" placeholder="{{ $precio_horausu }}" disabled >
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-dollar"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="direcciond" id="direcciond" class="gui-input" placeholder="{{ $direccion_usu }}" disabled >
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-flag"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <input type="text" name="documentod" id="correod" class="gui-input" placeholder="{{ $correo_usu }}"  disabled>
                                                <label for="tooltip3" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <i>@lang('traduccion1.sub3verperfil') :</i>
                                            </label>
                                            @if ($urllinkedin == null || $urllinkedin == "")
                                                <p style="color:red;">@lang('traduccion1.sub4verperfil')</p>
                                            @else
                                                <a href="{{ $urllinkedin }}" target="_blank">{{ $urllinkedin }}</a>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-md-1">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="section">
                                            <label class="field prepend-icon">
                                                <textarea class="gui-textarea" id="comentariod" name="comentariod" disabled placeholder="{{ $perfi_usu }}"></textarea>
                                                <label for="comment" class="field-icon">
                                                    <i class="fa fa-comments"></i>
                                                </label>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>


                                <div class="section-divider mv40" id="spy2">
                                    <span>@lang('traduccion1.sub5verperfil')</span>
                                </div>
                                @forelse($experiencia as $value)
                                    <div class="row panel-general">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="panel panel-info" style="border-radius: 50px">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding-top:14px"><center><img src="{{ asset('img/edit/empre.png')}}" width="70%" style=" max-width:130px;max-height:120 " height="60%" style="border-radius: 60%; "></center></div>
                                                        <div class="col-md-10">
                                                            <div style="">


                                                                <div class="row"><div class="col-md-12"><p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->company }}</p></div></div>
                                                                <div class="row">
                                                                    <div class="col-md-5" style="padding-bottom: 10px"><b class="text-primary mn">@lang('admin.txtcargoforeachexpe')</b>&nbsp; {{ $value->charge }}</div>
                                                                    <?php

                                                                    $originalini2 = $value->date_start;
                                                                    $originalfin2 = $value->date_end;


                                                                    $newfecini2 = date("d/m/Y",strtotime($originalini2));
                                                                    $newfecfin2 = date("d/m/Y",strtotime($originalfin2));

                                                                    ?>
                                                                    <div class="col-md-5"><b class="text-primary mn">@lang('admin.txtduracionforeachexpe') &nbsp;&nbsp;</b>&nbsp;{{ $newfecini2 }} @lang('admin.txthastaambosforeach') {{ $newfecfin2}}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-5" style="padding-bottom: 10px"><b class="text-primary mn"> @lang('admin.txtpaisforeachexpe')</b>&nbsp; {{ $value->name_country }}</div>
                                                                    <div class="col-md-5"><b class="text-primary mn">@lang('admin.txtciudadforeachexpe')</b> &nbsp;{{ $value->name_departament }}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <b class="text-primary mn">@lang('admin.txtdescriptionforeachexpe')</b> &nbsp;{{ $value->description_profile }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"> </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>

                                    </div>
                                @empty
                                    <center><p style="color: red;">@lang('traduccion1.sub6verperfil')</p></center>
                                @endforelse


                                <div class="section-divider mv40" id="spy2">
                                    <span>@lang('traduccion1.sub7verperfil')</span>
                                </div>

                                @forelse($estudios as $value)
                                    <div class="row panel-general">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="panel panel-info" style="border-radius: 50px">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding-top:14px"><center><img src="{{ asset('img/edit/estu.jpg') }}" width="70%" style=" max-width:130px;max-height:120 " height="60%" style="border-radius: 60%; "></center></div>
                                                        <div class="col-md-10">
                                                            <div class="row"><div class="col-md-12"><p style="font-size: 23px;font-weight: bold;color: #3bafda">{{ $value->institute }}</p></div></div>
                                                            <div class="row">
                                                                <div class="col-md-5" style="padding-bottom: 10px"><b class="text-primary mn">@lang('admin.txttipodeestudioforeachexpe')</b>&nbsp;
                                                                    @if($value->type_study == 0)
                                                                        @lang('traduccion1.sub8verperfil')
                                                                    @endif
                                                                    @if($value->type_study == 1)
                                                                        @lang('traduccion1.sub9verperfil')
                                                                    @endif
                                                                    @if($value->type_study == 2)
                                                                        @lang('traduccion1.sub10verperfil')
                                                                    @endif
                                                                    @if($value->type_study == 3)
                                                                        @lang('traduccion1.sub11verperfil')
                                                                    @endif
                                                                </div>
                                                                <?php

                                                                $original = $value->date_start;
                                                                $original2 = $value->date_end;

                                                                $newfecini = date("d/m/Y",strtotime($original));
                                                                $newfecfin = date("d/m/Y",strtotime($original2));


                                                                ?>
                                                                <div class="col-md-5"><b class="text-primary mn">@lang('admin.txtduracionforeachexpe')&nbsp;&nbsp;</b>&nbsp;{{ $newfecini }}  @lang('admin.txthastaambosforeach')  {{ $newfecfin }}</div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12" style="padding-bottom: 10px">
                                                                    <b class="text-primary mn">@lang('admin.txttituloforeachexpe')</b> &nbsp;{{ $value->degree }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-5" style="padding-bottom: 10px"><b class="text-primary mn">@lang('admin.txtpaisforeachexpe')</b>&nbsp; {{ $value->name_country }}</div>
                                                                <div class="col-md-5"><b class="text-primary mn">@lang('admin.txtciudadforeachexpe')</b> &nbsp;{{ $value->name_departament }}</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1"> </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                @empty
                                    <center><p style="color: red;">@lang('traduccion1.sub12verperfil')</p></center>
                                @endforelse





                            </div>


                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                    <!-- PANEL DE PUNTUACION DE TRABAJADOR -->
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('traduccion1.sub13verperfil') {{ $nombreusu }} {{ $apellidousu }}</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12 text-center" align="center">




                                    <!-----///////////////////////////////////////// ------>
                                    <?php

                                    $cuantoson = count($comen);
                                    $guarda = 0;
                                    $daprom = 0;


                                    ?>

                                    @forelse($comen as $calculo)
                                        <?php  $guarda += $calculo->qualification; ?>
                                        <?php

                                        $daprom = round($guarda/$cuantoson);
                                        ?>
                                    @empty

                                        <center><div style="width: 100%">
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                            </div></center>

                                    @endforelse


                                    @if($daprom == 0)

                                    @else
                                        @for($i=1;5>=$i;$i++)
                                            @if($daprom>=$i)
                                                <i class="fa fa-star" style="color: #f1c40f;font-size: 35px"></i>
                                            @else
                                                <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 35px"></i>
                                            @endif
                                        @endfor

                                    @endif






                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- FIN DEL MODAL -->

                    <!-- PANEL DEL PORCENTAJE DE PERFIL -->




                    <!-- PANEL DE HABILIDADES CERTIFICADAS -->
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.titlehabilidadescert')</span>
                        </div>
                        <div class="panel-body">
                            <center><span class="fs13 text-left ml10 ">
                      <i class="">@lang('traduccion1.sub14verperfil') {{$nombreusu}} {{$apellidousu}} @lang('traduccion1.sub15verperfil')</i></span></center>
                            <br/>
                            <div class="row">
                                <div class="col-md-4" align="center">
                                    <span>@lang('admin.titlehabilidad')</span>
                                </div>

                                <div class="col-md-4">

                                </div>

                                <div class="col-md-4" align="center">
                                    <span>@lang('admin.titlenivel')</span>
                                </div>
                            </div>
                            @forelse($certifi as $value)

                                <div class="row">
                                    <?php
                                    $a = $value->habilidad->ability;
                                    $mensaje = "";
                                    if ($value->habilidad->level_format==1 && $value->qualify==100 || $value->habilidad->level_format==2){
                                        $mensaje =  "Basico";
                                    }
                                    if($value->habilidad->level_format==2 && $value->qualify==100 || $value->habilidad->level_format==3){
                                        $mensaje = "Intermedio";
                                    }
                                    if($value->habilidad->level_format==3  && $value->qualify==100){
                                        $mensaje = "Avanzado";
                                    }
                                    if ($mensaje =="") {
                                        $mensaje ="Sin nivel";
                                        $a = "No tiene";
                                    }
                                    ?>
                                    <div class="col-md-4" align="center">
                                        {{ $a }}
                                    </div>
                                    <div class="col-md-4" align="center">
                                        <i class="fa fa-arrow-right" style="font-size: 20px;"></i>
                                    </div>
                                    <div class="col-md-4" align="center">
                                        {{ $mensaje }}
                                    </div>
                                </div>
                            @empty
                                <div class="row">
                                    <div class="col-md-4" align="center">
                                        @lang('traduccion1.sub16verperfil')
                                    </div>
                                    <div class="col-md-4" align="center">
                                        <i class="fa fa-arrow-right" style="font-size: 20px;"></i>
                                    </div>
                                    <div class="col-md-4" align="center">
                                        @lang('traduccion1.sub17verperfil')
                                    </div>
                                </div>
                            @endforelse


                        </div>
                    </div>



                    <!-- PANEL DE CALIFICACIONES -->
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title fw600 text-info" style="font-size: 15px;">@lang('admin.txtcalificaciones')</span>
                        </div>
                        <div class="panel-body">
                            <center>
                      <span class="fs13 text-left ml10 ">

                      <i class="">@lang('admin.txtestassoncali') {{ $nombreusu }} {{ $apellidousu }}</i>
                      </span>
                            </center><br>
                            <div class="panel">

                                <div class="panel-body panel-scroller scroller-md scroller-pn pn">



                                    @forelse($comen as $value)
                                        <?php  $us= $value->usuario ?>
                                        <div style="padding: 10px; background-color: #E6E6E6;margin: 5px;width: 100%">
                                            <?php
                                            $fechap = $value->date_finish;
                                            $newfecini = date("d/m/Y",strtotime($fechap));
                                            ?>
                                            <span style="float:right;">{{$newfecini}}</span><br>
                                            @lang('traduccion1.sub18verperfil'): {{ $us->nombres." ".$us->apellidos }}<br>
                                            @lang('traduccion1.sub19verperfil'):
                                            @for($i=1;5>=$i;$i++)

                                                @if($value->qualification>=$i)
                                                    <i class="fa fa-star" style="color: #f1c40f;font-size: 15px"></i>
                                                @else
                                                    <i class="fa fa-star-o"  style="color: #f1c40f;font-size: 15px"></i>
                                                @endif
                                            @endfor
                                            <br>
                                            @lang('traduccion1.sub20verperfil'): {{ $value->commit_finish }}

                                        </div>
                                    @empty
                                        <br>
                                        <center><div style="width: 100%">@lang('traduccion1.sub21verperfil')</div></center>
                                    @endforelse

                                </div>
                            </div>
                            <!-- AQUI IRA EL SELECT DE CUANDO EL EMPLEADOR, CALIFIQUE AL TRABAJADOR -->
                        </div>
                    </div>






                </div>
            </div>







            </row>
        </div>



        </div>
        </div>
        </div>
        </div>


        </div>

    </section>
    <!-- End: Content -->