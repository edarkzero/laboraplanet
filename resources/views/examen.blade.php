<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaboraPlanet</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('test/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('test/css/style.css')}}">
</head>

<style type="text/css">

body
{
  background: url("../test/images/fBuscar.jpg");
  background-size: cover;
  height: 100vh;
}

input[type="radio"] {
    display:none;
}

input[type="radio"] + label {
    color:black;
    font-family:Arial, sans-serif;
    font-size:14px;
}

input[type="radio"] + label span {
    display:inline-block;
    width:19px;
    height:19px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    background:url(http://webdesigntutsplus.s3.amazonaws.com/tuts/391_checkboxes/check_radio_sheet.png) -38px top no-repeat;
    cursor:pointer;
}

input[type="radio"]:checked + label span {
    background:url(http://webdesigntutsplus.s3.amazonaws.com/tuts/391_checkboxes/check_radio_sheet.png) -57px top no-repeat;
}

</style>

<body>

    <div class="main">

          <div class="container">
            <?php
            $nivel = "";
            switch ($examen->level_format) {
                case '1':
                $nivel = "Basico";
                break;
                case '2':
                $nivel = "Intermedio";
                break;
                case '3':
                $nivel = "Avanzado";
                break;
            }

            ?>
            <h1 style="color:#43d7ba;text-align: center;"> {{ $examen->name_format }} </h1>
            <p style="margin-left: 15px;margin-right: 15px;">Lee y responde todas las preguntas para determinar tu nivel {{ $nivel }} para la categoria {{ $plasmar->description }} en la habilidad {{ $plasmar->ability }}. </p>
        </div>
            <br/>
        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <?php
                $total = count($examen->preguntas);
                $c = 1;
                 ?>
                @forelse($examen->preguntas as $pregunta)
                <h3></h3>
                <fieldset>
                    <span class="step-current"> <span class="step-current-content"><span class="step-number"><span>{{ $c }}</span>/{{ $total }}</span></span> </span>
                    <div class="fieldset-flex">
                        <figure>
                            <img src="{{ asset('test/images/signup-img-1.png')}}" alt="">
                        </figure>
                        <div class="fieldset-content" data-p='{{ $pregunta->id_question }}' data-pre='{{ $c }}'>
                            <h2>¿{{ $pregunta->concept }}?</h2>
                            <div>
                                @forelse($pregunta->respuestas as $respuesta)
                                <input type="radio" id="r{{ $respuesta->id_option_question }}" name="rr{{ $pregunta->id_question }}" value="{{ $respuesta->id_option_question }}" />
                                    <label for="r{{ $respuesta->id_option_question }}"><span></span>{{ $respuesta->option_question }}</label>
                                    <p/>
                                @empty
                                    Error no se encontro respuestas
                                @endforelse
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php $c++; ?>
                @empty
                Error no se encuentran preguntas
                @endforelse
                <div style="display: none;" id="div-nota">
                    <span class="step-current"> <span class="step-current-content"></span> </span>
                    <div class="">

                            <center><img src="{{ asset('test/images/signup-img-1.png')}}" alt="">
                        <div class="" ><br>
                            <h2>Se completo el examen la nota es:</h2>
                                <h2 id="nota"></h2>
                        </div>
                        </center>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('test/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        });
       var formato = {{$examen->id_format}};
        var habilidad = {{ $examen->id_ability }};
    </script>
    <script type="text/javascript" src="">  </script>
    <script src="{{ asset('test/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('test/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{ asset('test/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('test/js/main.js')}}"></script>

</body>

</html>
