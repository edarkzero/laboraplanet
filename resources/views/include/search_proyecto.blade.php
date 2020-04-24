    <style type="text/css">
  #box {
    height: 200px !important;
  }

</style>
    <div class="slider-wrap"  style="width: 100%;height: 300px">
    <ul class="rslides" style="width: 100%;">
      <li><img src="img/edit/1.jpg" alt="" style="height: 300px"></li>
      <li><img src="img/edit/2.jpg" alt="" style="height: 300px"></li>
      <li><img src="img/edit/3.jpg" alt="" style="height: 300px"></li>
    </ul>
    <div class="slider-container2">
        <div class="row"  id="box">

          <div class="col-md-2"></div>

          <div class="col-md-8">
            <div class="">
                <div class="" align="center" >
                  <h1 style="color: white;font-size: 14px" >@lang('traduccion1.sub1search_proyecto')</h1>
                  <p style="color: white;font-size: 12px"  class="lead">@lang('traduccion1.sub2search_proyecto')</p>
                </div>
                <form action="" >
                <div class="" style="border: none;">
                  <div class="row">
                  <div class="col-md-1"></div>

                <div class="col-xs-9">
                 <input type="text" id="txtbusqueda" name="txtbusqueda" class="form-control" placeholder="@lang('traduccion1.sub12search_proyecto')" value="{{ Request::get('txtbusqueda') }}">
                 <!--<br>-->
                 <div>
                  <a href="javascript:void(0)" id="mostrar" style="text-align: right; text-decoration: none; font-size: 15px ">@lang('admin.txtbusquedaavanzada') <i style="margin-left:2%; margin-bottom: 10px;" class="fa fa-angle-down"></i></a>
                </div>
                </div>

                <div>
                  <div class="btn-group">
                  <button  class="btn btn-system" id="buscar">
                   <i class="fa fa-search"></i>
                    </button>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-system" id="procesar2">
                      <i class="fa fa-microphone-slash" id="icon2"></i>
                    </button>
                  </div>

                </div>
                </div>
                <div class="row avanzado" style="display: none">
                     <div class="col-md-3">
                  <select id="presupuesto" class="form-control" name="presupuesto">
                    <option  selected value="">@lang('traduccion1.sub3search_proyecto')</option>
                    <option value="3">@lang('traduccion1.sub4search_proyecto')</option>
                    <option value="1">@lang('traduccion1.sub5search_proyecto')</option>
                    <option value="2">@lang('traduccion1.sub6search_proyecto')</option>
                  </select>
                  <br>
                </div>
                <div class="col-md-3">
                  <select id="pais" class="form-control" name="pais">
                    <option value="">@lang('admin.placeholderpaisbuscatra')</option>
                    <option value="1">Colombia</option>
                    <option value="2">Argentina</option>
                    <option value="3">Perú</option>
                    <option value="4">Otro</option>
                  </select>
                  <br>

                </div>
                  <div class="col-md-3">
                    <select class="form-control" id="estados" name="estado">
                      <option  selected value="">Estado</option>
                      <option value="1">@lang('traduccion1.sub8search_proyecto')</option>
                      <option value="3">@lang('traduccion1.sub9search_proyecto')</option>
                      <option value="4">@lang('traduccion1.sub10search_proyecto')</option>
                      <option value="5">@lang('traduccion1.sub11search_proyecto')</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" id="categoria" name="categoria">
                        <option  selected value="">Categoria</option>
                        <option value="1">Desarrollo de software y app</option>
                        <option value="2">Diseno, creatividad y arte</option>
                        <option value="3">Infraestructura tecnologica</option>
                        <option value="4">Escritura de textos</option>
                        <option value="5">Traduccion</option>
                        <option value="6">Ingenieria y arquitectura</option>
                        <option value="7">Temas legales</option>
                        <option value="8">Analytics, BI y Datascience</option>
                        <option value="9">Soporte administrativo</option>
                        <option value="10">Contabilidad y economica</option>
                        <option value="11">Psicologia</option>
                        <option value="12">Ventas y marketing</option>
                    </select>
                  </div> 
                  
                <!-- <div class="col-md-2">
                    <select id="habilidad" name="habilidad" class="form-control">
                  <option value="">Habilidad</option>
                  @foreach($hab as $value)
                  <option value="{{ $value->id_ability }}">{{ $value->ability }}</option>
                  @endforeach

              </select>
                  </div>-->

                </div>

                </div>
                </form>
            </div>


          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </div>
