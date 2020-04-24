<style type="text/css">
  #box {
    height: 150px !important;
  }

</style>
<div class="slider-wrap"  style="width: 100%;height: 300px">
    <ul class="rslides" style="width: 100%;height: 50px !important">
      <li><img src="img/edit/1.jpg" alt="" style="height: 260px"></li>
      <li><img src="img/edit/2.jpg" alt="" style="height: 260px"></li>
      <li><img src="img/edit/3.jpg" alt="" style="height: 260px"></li>
    </ul>
    <div class="slider-container3">
         <form action="">
        <div class="row" style="margin-top: 2%;" id="box">

          <div class="col-md-2"></div>

          <div class="col-md-8"  >
            <div class="">
                <div class="" align="center" >
                  <h1 style="color: white;font-size: 14px">@lang('admin.buscartrabajadores')</h1>
                  <p style="color: white;font-size: 12px" class="lead">@lang('admin.txtbucanuevoxd')</p>
                </div>
               
                <div class="row" style="border: none;">

                  <div class="col-md-1"></div>

                <div class="col-xs-9 form-group">
                 <input type="text" id="txtbusqueda" name="txtbusqueda" class="form-control" placeholder="@lang('admin.txtplacenuevoxd')" value="{{ Request::get('txtbusqueda') }}">
                  <!--<br>-->
                  <div align="right">
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
                    <button type="button" class="btn btn-system" id="procesar3">
                      <i class="fa fa-microphone-slash" id="icon3"></i>
                    </button>
                  </div>

                </div>

                


                </div>
                
                
            </div>
                

          <div class="col-md-2"></div>
        </div>
      </div>
      <div class="row avanzado" style="display: none">
                 <!-- <div class="col-md-1">

                  </div>-->
                  <div class="col-xs-6">
                  <select id="precio" class="form-control" name="precio" style="max-width:250px;float:right">
                    <option  selected value="">@lang('traduccion1.sub1search_trabajadores')</option>
                    <option value="1">@lang('traduccion1.sub2search_trabajadores')</option>
                    <option value="2">@lang('traduccion1.sub3search_trabajadores')</option>
                    <option value ="3">@lang('traduccion1.sub4search_trabajadores')</option>
                  </select>
                  </div>
                  <div class="col-xs-6">
                  <select id="paiss" class="form-control" name="paiss" style="max-width:250px;"> 
                    <option  selected value="">@lang('traduccion1.sub5search_trabajadores')</option>
                    <option value="1">Colombia</option>
                    <option value="2">Argentina</option>
                    <option value="3">Perú</option>
                    <option value="4">Otro</option>
                  </select>
                  </div>
                  <!--<div class="col-md-1">

                  </div>-->
                </div>
      </form>
      <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                      <br><a href="javascript:void(0);" id="solicita" style="background-color:rgb(55,188,155);color:white;font-size:14px;padding:5px"> @lang('traduccion1.sub6search_trabajadores') </a>
            </div>
      </div>

    </div>
  </div>
