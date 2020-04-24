@extends('layouts.admin2')
@section('css')
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">
<!-- NO INDEX -->
<meta name="googlebot" content="noindex, nofollow" />
<!-- FIN -->

@endsection

@section('js')

@endsection

@section('contenido')
<div class="tray tray-center" style="padding-left: 10px" id="todo">
 
          <div class=" mw1000 center-block  animated fadeIn" style="padding-top: 30px;">
            <div class="admin-form theme-primary">
                                   <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light"> 
                    <div class="section-divider mb40" id="spy1">       
                      <span style="font-size: 25px">@lang('traduccion1.titulo_politica_privacidad')</span>
                    </div>
                    <div align="center">
                    	<span style="font-size:20px"><b>@lang('traduccion1.subtitulo_politica_privacidad')</b></span>
                    </div>
                    <br/><br/>
                    <div class="row">
                    	<div class="col-md-2">
                    		
                    	</div>
                    	<div class="col-md-8">
                    	<p class="text-primary mn" style="font-size: 16px;font-weight: bold;padding-bottom:10px;color:#5DB62B">@lang('traduccion1.sub1politica_privacidad')</p>
                    	<p  align="justify"> @lang('traduccion1.descripcion1_politica_privacidad')                    	</p>
                    	<p class="text-primary mn" style="font-size: 16px;font-weight: bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub2politica_privacidad')</p>
                    	<p align="justify">
                    	•	<b>@lang('traduccion1.razon_politica_privacidad')</b>@lang('traduccion1.sub3politica_privacidad')<br/> 
      					<!--•	Dirección: Calle Viña Carlini 151, Santiago de Surco, Lima – Perú<br/> -->
						•	<b>@lang('traduccion1.sub4politica_privacidad')</b> www.laboraplanet.com<br/>
						•	<b>Email:</b> contacto@laboraplanet.com
                    	</p>
                    	<p class="text-primary mn" style="font-size: 16px;font-weight: bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub5politica_privacidad')</p>
                    	<p align="justify">@lang('traduccion1.sub6politica_privacidad')
                        </p>
                        <p align="justify"> @lang('traduccion1.sub7politica_privacidad')
                        </p >
                        <p  align="justify">@lang('traduccion1.sub8politica_privacidad')</p>
                        <p  align="justify">@lang('traduccion1.sub9politica_privacidad')
</p>   
                    
<p align="justify">@lang('traduccion1.sub10politica_privacidad')</p>
<p align="justify">@lang('traduccion1.sub11politica_privacidad')</p>   
                
                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion1.sub12politica_privacidad')</p>

                    	<p  align="justify">@lang('traduccion1.sub13politica_privacidad')
                        
                        </p>

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px"  align="justify">@lang('traduccion1.sub14politica_privacidad') </p>

                    	<p style="padding-left:20px"  align="justify">@lang('traduccion1.sub15politica_privacidad')
                    		

                    	</p>

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B" >@lang('traduccion1.sub16politica_privacidad')</p>

                    	<p  align="justify">
                    	    <div style="padding-left:15px;">@lang('traduccion1.sub17politica_privacidad')<br></div>
						    <div style="padding-left:40px;">@lang('traduccion1.sub18politica_privacidad')
	
						    </div> 
						
                    	</p>

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub19politica_privacidad')</p>

                    	<p class="text-primary mn" style="font-size: 14px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion1.sub40politica_privacidad')</p>
                    	<p align="justify">@lang('traduccion1.sub20politica_privacidad')
                        
                        </p>
                        <p align="justify">@lang('traduccion1.sub21politica_privacidad')
                            
                        </p>
                        <p align="justify">@lang('traduccion1.sub22politica_privacidad')
                             
                        </p>

                    	<p class="text-primary mn" style="font-size: 14px;font-weight:bold;padding-bottom:10px;padding-top:10px">@lang('traduccion1.sub41politica_privacidad')</p>
                    	<p align="justify">@lang('traduccion1.sub23politica_privacidad')
                    	    
                    	</p>
                    	<p align="justify">@lang('traduccion1.sub24politica_privacidad')
                    	     
                    	</p>   
                    	<p align="justify">@lang('traduccion1.sub25politica_privacidad')
                    	    
                    	</p>
                        <p align="justify">@lang('traduccion1.sub26politica_privacidad')
                            
                        </p>
                    	<p class="text-primary mn" style="font-size: 14px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub27politica_privacidad')</p>
                    	<p align="justify">@lang('traduccion1.sub28politica_privacidad')</p>
                    	<p align="justify">@lang('traduccion1.sub29politica_privacidad')</p>
                        <p align="justify">@lang('traduccion1.sub30politica_privacidad')</p>
                    	
                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub31politica_privacidad')</p>
                        <p align="justify">@lang('traduccion1.sub32politica_privacidad') </p>
                        <p align="justify">@lang('traduccion1.sub33politica_privacidad')
</p>
                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub34politica_privacidad')</p>	
                    	<p  align="justify">@lang('traduccion1.sub35politica_privacidad')
                    	</p>

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub36politica_privacidad')</p>
                    	<p  align="justify">@lang('traduccion1.sub37politica_privacidad')
                    	</p>

                    	<p class="text-primary mn" style="font-size: 16px;font-weight:bold;padding-bottom:10px;padding-top:10px;color:#5DB62B">@lang('traduccion1.sub38politica_privacidad')</p>
                    	<p  align="justify">@lang('traduccion1.sub39politica_privacidad')
                                                	</p>
                    	</div>
                    	<div class="col-md-2">
                    		
                    	</div>
                    </div>
                    

                </div>
              </div>
            </div>
          </div>
</div>


@endsection

