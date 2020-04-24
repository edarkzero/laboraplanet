 @foreach($trabajadores as $values)
 <script type="text/javascript" src="js/jquery.expander.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      // use esta configuracion simple para valores por defecto
      //$('div.expandable p').expander();
      // *** O ***
      // configure de la siguiente manera
      $('div.expandable p').expander({
      slicePoint: 60, // si eliminamos por defecto es 100 caracteres
      expandText: '[...]', // por defecto es 'read more...'
      collapseTimer: 5000, // tiempo de para cerrar la expanci¨®n si desea poner 0 para no cerrar
      userCollapseText: '[^]' // por defecto es 'read less...'
    });
  });
</script>
            <div class="panel panel-info" style="border-radius: 50px">
                    <div class="panel-body" style="border: none;">
                      <div class="row">

                         <?php
                         $foto =  $values->imagen;
                         $plasmar = "";

                         if($foto!=null)
                          {
                              $plasmar =  $values->imagen;
                          } 
                          else
                          {
                            $plasmar = 'img/none.png';
                          }

                         ?> 
                        <div class="col-md-2" style="padding-top:14px">
                          <center>
                            <img src="{{$plasmar}}" width="130" height="120" style="border-radius: 60%; ">
                          <p style="padding-top: 10px">
                            @if ($values->id_country==0)
                            @lang('traduccion1.sub1trabajadores_paginate')<br>  
                          @else
                            {{ $values->name_country  }} -  <img src="img/pais/{{ $values->codigo_pais }}.gif" width="30" height="20"><br>
                            @if($values->precio_hora!=null)
                            <div>@lang('traduccion1.sub2trabajadores_paginate'): ${{ $values->precio_hora }}</div>
                            @endif

                          @endif
                        </p>
                      </center>
                    </div>
                        <div class="col-md-7">
                             
<a href="verperfil/{{ $values->id }}"  style="font-size: 20px;font-weight: bold;color: #3bafda" id="{{$values->id}}">{{ $values->nombres ." ".$values->apellidos ."   "}}</a>                           
                            
                          <p><b>@lang('admin.txtperfiltrabenco')</b> 
                            @if ($values->perfil==null)
                              @lang('traduccion1.sub3trabajadores_paginate')
                              @else
                              <div class="expandable">
                                  <p>  {{ $values->perfil  }}</p>
                                </div>
                            @endif
                          </p>

                          <p>
                            <div class="admin-form theme-primary" style="width: 100%;">
                              <span class="rating block">
                              <span><i class="fa fa-user" style="float: left;padding-right:  10px;"></i>&nbsp;&nbsp;</span>
                              <div style="float: left;">
                              <input class="rating-input" id="r5" type="radio" name="custom">
                              <label class="rating-star" for="r5">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r4" type="radio" name="custom">
                              <label class="rating-star" for="r4">  
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r3" type="radio" name="custom">
                              <label class="rating-star" for="r3">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r2" type="radio" name="custom">
                              <label class="rating-star" for="r2">
                                <i class="fa fa-star"></i>
                              </label>
                              <input class="rating-input" id="r1" type="radio" name="custom">
                              <label class="rating-star" for="r1">
                                <i class="fa fa-star"></i>
                              </label>
                              </div>
                              </span>
                            </div>
                          </p>
                          <p>@lang('traduccion1.sub4trabajadores_paginate'): {{date('d-m-Y',strtotime($values->fecha))}}</p>
                        <?php

                             $certificadoswe = \App\Certifi_user::where('id',$values->id)->get();
                             //echo $certificadoswe;
                          ?>
                            <div class="expandable">
                          <p><b>@lang('traduccion1.sub5trabajadores_paginate'):</b>
                            <?php
                              foreach ($certificadoswe as $key) {
                                  echo $key->nombre_cer." - ";
                              }

                            ?>
                          </p>
                          <p><b>@lang('traduccion1.sub6trabajadores_paginate'):</b>
                          <?php
                          $un = $values->unoconocimiento;
                          $do =$values->dosconocimiento;
                          $tre = $values->tresconocimiento;
                            $t = "";
                            if(trim($un)!="" ||$un!=null){
                                $t =$un;
                            }
                            if(trim($do)!="" ||$do!=null){
                                if(trim($un)!="" ||$un!=null){
                                    $t.=", ";
                                }
                                $t .=$do;
                            }
                              if(trim($tre)!="" ||$tre!=null){
                                if(trim($un)!="" ||$un!=null){
                                    if(trim($do)=="" ||$do==null){
                                        $t.=", ";
                                    }
                                }else{
                                    if(trim($do)!="" ||$do!=null){
                                        $t.=", ";
                                    }
                                }
                                
                                $t .=$tre;
                            }
                            
                          ?>
                          {{ $t }}
                          </p>
                        </div>

                          <p>
                            <div class="col-md-6" style="padding: 0px;padding-bottom: 10px">@lang('traduccion1.sub7trabajadores_paginate'):
                              <?php 
                              $vr = $values->reconocimiento;
if($vr==0)
  {
    $medalla = 'img/medallas-labora/medalla-inicio.png';
    $textomedalla = "INICIO";
  }
  if($vr==1)
  {
    $medalla = 'img/medallas-labora/medalla-entusiasta.PNG';
    $textomedalla ='ENTUSIASTA';
  }
  if($vr==2)
   {
    $medalla = 'img/medallas-labora/medalla-honorable.PNG';
    $textomedalla = 'HONORABLE';
   }

   if($vr==3)
   {
    $medalla = 'img/medallas-labora/medalla-asociado.PNG';
    $textomedalla = 'ASOCIADO';
   }
   if($vr==4)
   {
    $medalla ='img/medallas-labora/medalla-partner.PNG';
    $textomedalla ='PARTNER'; 
   }
   if($vr==5)
   {
    $medalla ='img/medallas-labora/medalla-especialista.PNG';
    $textomedalla ='ESPECIALISTA'; 
   }

   if($vr==6)
  {
    $medalla ='img/medallas-labora/medalla-experto.PNG';
    $textomedalla ='EXPERTO'; 
  }
   if($vr==7) 
    {
    $medalla ='img/medallas-labora/medalla-master.PNG';
    $textomedalla ='MASTER'; 

    }
                              ?>
                              <img src="{{$medalla}}" width="50" height="50">{{$textomedalla}}
                            </div>

                            <div class="col-md-6" style="padding-top: 15px;">@lang('traduccion1.sub8trabajadores_paginate') {{$values->nivel}}</div>
                          </p>
                        </div>
                        <div class="col-md-1"> </div>
                        <div class="col-md-3">
                          <div style="padding-top: 10%">
                            <center>
                   <!--          <p><button class="btn btn-sm btn-primary btn-block" style="width: 150px">@lang('admin.btnadirfavov')</button></p> -->
                            <p style="padding-left: 15px">
                            
                                 <a href="emplear/{{ $values->id }}" class="btn btn-sm btn-primary btn-block" style="width: 135px;font-size: 15px">@lang('traduccion1.sub9trabajadores_paginate')</a></p>
                              

                              
                              <div class="col-md-12" style="font-size: 12px;padding-left: 30px" >

                                <center>
                                  @if(Auth::guest())
                                      <div class="col-xs-6">
                                      <center>
                                      <a href="register" class="btn btn-sm btn-primary" style="width: 50px;">
                                      <img src="img/icon/favorito.png" width="30" height="30">
                                      </a><br/>
                                       @lang('traduccion1.sub10trabajadores_paginate')
                                      <br><br>
                                       </center>
                                         </div>
                                             <div class="col-xs-6">
                                     <center> 
                                  <a href="register" class="btn btn-sm btn-primary" style="width: 50px;">
                                  <img src="img/icon/messenger.png" width="30" height="30">
                                </a>
                                @lang('traduccion1.sub11trabajadores_paginate')</center>
                                  
                                    
                                  </div>
                                      @else
                                       <div class="col-xs-6">
                                       <center>
                                       <button class="btn btn-sm btn-primary favorite" style="width: 50px;" data-id="{{ $values->id }}">
                                        <img src="img/icon/favorito.png" width="30" height="30">
                                      </button>
                                      <br/>
                                     @lang('traduccion1.sub12trabajadores_paginate') 
                                      <br><br>
                                       </center>
                                     </div>
                                         <div class="col-xs-6">
                                     <center> 
                                  <button class="btn btn-sm btn-primary contactar" style="width: 50px;" data-id="{{ $values->id }}">
                                  <img src="img/icon/messenger.png" width="30" height="30">
                                </button>
                                @lang('traduccion1.sub13trabajadores_paginate')</center>
                                  </div>
                                      @endif
                               
                                </center>
                              </div>
                            <p style="padding-top: 20px">
                            </p>
                            </center>
                          </div>
                        </div>
                      </div>                
                    </div>
                  </div>
                  @endforeach
                 


           <center>{{ $trabajadores->appends(Request::only(['txtbusqueda']))->render() }} </center>