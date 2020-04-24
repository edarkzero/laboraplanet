@foreach($proyect as $values)
    <script type="text/javascript" src="js/jquery.expander.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      // use esta configuracion simple para valores por defecto
      //$('div.expandable p').expander();
      // *** O ***
      // configure de la siguiente manera
      $('div.expandable p').expander({
      slicePoint: 30, // si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanci¨®n si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
    });
  });
</script>

            <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 0px;padding-left: 20px;background-color: #4fc1e9">
                      <span class="panel-icon"></span>
                      
                      <span style="color: white">{{ $values->titulo }} </span>
                      <span style="float: right;color:red;padding-right: 20px">@if($values->urgente=="1") @lang('traduccion1.sub1users')  @endif </span>
                   </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-2"><center>
                            
                             <?php $img = $values->logo_empresa; 
                            if ($img==null) {
                              $img= $values->imagen;
                              if ($img==null) {
                                $img ="img/edit/31626.jpg"; 
                              }
                            }

                           ?>
                          <center><img src="{{ $img }}" width="130" height="120px"></center>
                            
                            
                            </center>
                                                       <br/>
                            @if($values->codigo_pais == null)
                            @else
                     <img src="img/pais/{{ $values->codigo_pais }}.gif" width="30" height="20">       
                            @endif 
                            
                            
                            </div>
                        <div class="col-md-7">
      <?php 
                          $nombre = $values->nombre_empresa;
                          if ($nombre==null) {
                            $nombre=$values->nombres." ".$values->apellidos;
                          }
                          ?>
                          <p><b>@lang('traduccion1.sub2users'):</b> {{ $nombre }}</p>

                          <div class="expandable">
                            <p><b>@lang('traduccion1.sub3users'):</b> {{ $values->descripcion }}</p>
                          </div>
              <div class="expandable">
<!-- Nuestro parrafo a mostrar-->
<p><b>@lang('traduccion1.sub4users') :</b> {{$values->habilidades}}</p>
</div>
                          
                            <p style="font-size: 8px;"></p> 
 
                          <p><b>@lang('admin.estadobt')</b>
                           @switch($values->estado)
                                @case(1)
                                   @lang('traduccion1.sub5users') 
                                    @break
                                @case(2)
                                  @lang('traduccion1.sub6users')  
                                    @break
                                @case(3)
                                   @lang('traduccion1.sub7users') 
                                    @break
                                @default
                                        
                            @endswitch</p>
                          <p><b>@lang('traduccion1.sub8users'):</b> {{ $values->cantidad_tiempo }}
                            @switch($values->tiempo_entrega)
                                @case(1)
                                  @lang('traduccion1.sub9users')  
                                  @break
                                @case(2)
                                  @lang('traduccion1.sub10users')  
                                  @break
                                @case(3)
                                  @lang('traduccion1.sub11users')  
                                  @break
                                @case(4)
                                  @lang('traduccion1.sub12users')  
                                  @break
                                @default

                            @endswitch

                          </p>

                            
                          <p><b>@lang('traduccion1.sub13users'): </b>${{ $values->presupuesto }}</p>
                        </div>
                        <div class="col-md-3">
                          <center>
                            <p>{{ $values->presupuesto }}-USD</p>
                          @if(Auth::guest())
                          <a href="register"><p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnaplicar')</button></p></a>
                          @else
                          <a href="aplicar/{{$values->id}}"><p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnaplicar')</button></p></a>
                          @endif
                          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px" onclick="PublicarParecido('{{$values->id}}');">@lang('admin.btnpublicarparecido')</button></p>
                          {{-- Hoy --}}{{-- {{ $values->fecha_publicacion }} --}}
                          @php
                            $date= $values->fecha_publicacion  ;
                            $fechaI=date_create($date);
                            $fechaF=date_create(date("Y/m/d"));
                            $dife=date_diff($fechaI,$fechaF);
                            $datedif = $dife->days;
                             // echo $datedif;
                            if($datedif==0){
                              $datedif="Hoy";
                              echo $datedif;
                            }else{
                              $datedif='Hace  '.$datedif.' dias';
                              echo $datedif;
                            }
                          @endphp

                          </center>
                        </div>
                      </div>                
                    </div>
                  </div>
@endforeach
            <center>{{ $proyect->appends(Request::only(['txtbusqueda']))->render() }}</center>