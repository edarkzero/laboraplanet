@extends('layouts.admin2')
@section('css')
   <link rel="stylesheet" type="text/css" href="css/jQuery-plugin-progressbar.css">
<style type="text/css">
  .select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
  select{
    font-family: fontAwesome;

  }
</style>
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/> --}}

@endsection



@section('contenido')
<div class="tray tray-center" style="padding-left: 10px">
  <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;border-radius: 20px">
    <div class="admin-form theme-primary">
      <div class="panel heading-border panel-primary">
          <div class="panel-body bg-light">
              <div class="section-divider mb40" id="spy1">
                <span style="font-size: 25px">@lang('traduccion2.txttilebienvenidoaltes')</span>
              </div>

              <div class="row">
                      <div class="col-md-6">
                        <div class="section">
                          <label class="field select">

                            <select id="categoria" name="categoria">
                              <option value="">@lang('admin.placeholdcattest')</option>
                      @foreach($categoria as $value)
                           @if($value->id_category!=null)
                           <option value="{{ $value->id_category }}">{{ $value->description }}</option>
                           @else
                           <option disabled>{{ $value->description }}</option>
                           @endif
                           @endforeach
                            </select>

                            <i class="arrow"></i>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="section">
                          <label class="field select">
                            <select id="habilidad" name="habilidad">
                              <option value=""  style="font-size:15px;font-weight:bolder;">@lang('traduccion2.txtcboopc1cono')</option>
                            </select>
                            <i class="arrow double"></i>
                          </label>
                        </div>
                      </div>
            <?php $h = [];$a=0; ?>
       @forelse($habilidad as $value)
            @if($a!=$value->id_ability)
            <?php
            $url = "javascript:void(0);";
            $a =  $value->id_ability;
            $h[] = $a;
            $c = 0;
            $mens = "Nivel a alcanzar - Basico";
            $btn = "default disabled";
            $url = "";
            if($value->id_format!=null){
              $c = $value->qualify;
              $url = "examen/".$value->id_ability;
            }
            if ($value->id_format!=null) {
              $btn = 'primary';
            }
              if ($value->level_format==1) {
              $mens = "Nivel a alcanzar - Basico";
              }
              if ($value->level_format==2 || ($value->level_format==1 && $c==100)) {
              $mens = "Nivel a alcanzar - Intermedio";
              }
              if ($value->level_format==3 || ($value->level_format==2 && $c==100)) {
              $mens = "Nivel a alcanzar - Avanzado";
              }
              if ($value->level_format==3 && $c==100) {
              $mens = "Certificar";
              }

             ?>
            <div class="categoria categoria-{{ $value->id_category }}">
              <div class="col-md-4 habilidad habilidad-{{  $a }}">
                <div class="panel">
                  <div class="panel-heading" style="padding: 0px"><center><a href="{{ $url }}" class="btn btn-{{ $btn }}">{{ $mens }}</a><a href="javascript:void(0);" class="btn btn-eliminar" data-id="{{ $a }}" style="float: right;font-size: 20px;"><i class="fa fa-trash-o"></i></a></center>
                  </div>

                  <div class="panel-body"><center><div class="progress-bar1 position" align="center" data-percent="{{ $c }}" data-duration="2000"></div></center></div>
                  <div class="panel-footer"><center><b>{{ $value->ability }}</b></center></div>
                </div>
              </div>
            </div>
            @endif

            @empty
            <br><br>
            <center><h2>@lang('traduccion2.txtaunnohasañacono')</h2></center>
            @endforelse

          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection


@section('js')
  <script src="vendor/plugins/tagsinput/tagsinput.min.js"></script>
  <script src="js/jQuery-plugin-progressbar.js"></script>
<script src="js/laborajs/certificar.js"></script>
<script type="text/javascript">
  var s = [<?php echo implode(",",$h ) ?>];
  // console.log(s);
  // $.each(s,function(indice,value){
  //   console.log(value);
  // })
</script>
@endsection
