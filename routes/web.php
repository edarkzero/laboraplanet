<?php

// Route::get('/',function() {
// 	return view('index');  
// })->name('index');

Route::get('/','UserController@estadisticas')->name('index');

// Route::get('categorias','UserController@todascategorias');
Route::post('buscar','UserController@buscar');
Route::post('llenarhabilidad','UserController@llenarhabilidades')->name('llena_habilidad');
Route::post('llevacatx','UserController@llevacatx');

// 	Route::post('verdatelletrabajador','TrabajadoresController@vertrabajador');

Route::get('trabajadores','TrabajadoresController@index')->name('trabajadores');

Route::get('borrarxd',function(){
	return view('mail.laborainforma');
});

Route::post('pasaayuda','UserController@pasaayuda')->name('pasaayuda');
Route::get('contacto',function(){
return view('contacto');
})->name('contacto');

Route::get('buscar_trabajo','ProyectoController@index')->name('buscar_trabajo');
Route::get('proyecto','ProyectoController@proyecto');

//proyecto controller cuando no esta logeado
Route::get('oblilog',function(){
	return view('oblilog');
});

Route::get('aprobadoni',function(){
		return view('aprobadoni');
})->name('aprobadoni');

/** PARA EL ENVIO DE CORREO DE SOLICITA INFORMACION DEL INDEX **/
Route::post('correo_solicita','SeguridadController@correo_solicita');	

//PARA LA ACEPTACION DEL FORMULARIO DE HIJOS
Route::get('/users4/confirmation4/{token}','CertificacionController@confirmation')->name('confirmation4');
//FIN DE ESO :v
//PARA LA NEGACION DEL FORMULARIO DE Hijos
Route::get('/users5/confirmation5/{token}','CertificacionController@denegacion')->name('confirmation5');
//FIN DE ESO :v

//*** VISTO PARA EL RECIBO DE COMPRAS ***//

//PARA EL PAGO DE VISA  PARA HACER EL PROYECTO URGENTE - VALIDO
Route::get('recibo','ReciboController@index')->name('recibo');
Route::get('imprimir_recibo/{numpedido}/{numautori}/{comprador}/{numtarje}/{fechayhoralleva}/{importe}/{moneda}/{comentarios}/{idtransac}','ReciboController@imprimir_recibo')->name('imprimir');



//PARA EL PAGO DE VISA PARA HACER EL PROYECTO URGENTE - INVALIDO
Route::get('recibo_error','ReciboController@index2')->name('recibo_error');
Route::get('imprimir_recibo_error/{numpedido}/{numtarje}/{fechayhoralleva}/{comentarios}','ReciboController@imprimir_recibo_error')->name('imprimir_error');


//PARA EL PAGO DE VISA,PAGO DE PROYECTO - CONTRATAR - VALIDO
Route::get('recibo_pago','ReciboController@index3')->name('recibo_pago');


//PARA EL PAGO DE VISA, PAGO DE PROYECTO -CONTRATAE - INVALIDO
Route::get('recibo_pago_error','ReciboController@index4')->name('recibo_pago_error');

//*** FIN ***//

Route::get('recibo_pago_planes','ReciboController@index6')->name('recibo_pago_planes');
Route::get('recibo_pago_error_planes','ReciboController@index5')->name('recibo_pago_error_planes');



Route::get('locale/{locale}',function($locale) {
		Session::put('locale',$locale);
		return redirect()->back();
})->name('locale');


Route::get('laborapl',function() {
	return view('laborapl');
})->name('laborapl');
Route::get('politica',function() {
	return view('politica_privacidad');
})->name('politica');
Route::get('laboraplanet',function(){
	return view('vision_mision');
})->name('laboraplanet');
Route::get('construccion',function() {
	return view('construccion');
})->name('construccion');

Route::get('proposito',function(){
	return view('proposito');
})->name('proposito');
Route::get('mision',function(){
	return view('mision');
})->name('mision');
Route::get('vision',function(){
	return view('vision');
})->name('vision');


Route::get('terminos',function() {
	return view('terminos_condiciones');
})->name('terminos');

Route::get('publicar_trabajo','PProyectoController@index')->name('publicar_trabajo');

Route::get('recuperarC',function(){
	return view('recuperarC');
})->name('recuperarC');

Route::post('recuperarcorreo','SeguridadController@recuperarC');
Route::post('confirmartoken','SeguridadController@confirmartoken');
Route::post('update_recuperar','SeguridadController@update_recuperar');

Route::post('envioemail','SeguridadController@envioemail');

Route::post('baja','SeguridadController@baja');




Route::get('proyectoDetalle/{proyecto}','AplicacionController@proyectoDetalle')->name('proyectoDetalle');


//PARA CONFIRMAR LA BAJA DEL USUARIO
Route::get('/users3/confirmation3/{token}','SeguridadController@confirmation')->name('confirmation3');
//FIN


Route::get('convocatoria','IpController@convocatoria');
Route::get('convocatoriae','IpController@convocatoriae');
Route::post('create','ConvocatoriaController@create')->name('create');


Route::get('auth/{provider}', 'Auth\SocialiteController@redirectToProvider')->name('social.auth')->middleware('guest');
Route::get('auth/{provider}/callback', 'Auth\SocialiteController@handleProviderCallback')->middleware('guest');
/*************************** DESDE AQUI **********************************/

Auth::routes();
Route::get('register','IpController@registrar')->name('register')->middleware('guest');


Route::get('login','LoginController@login')->name('login')->middleware('guest');
Route::get('callback','LoginController@callback');
// Route::get('login',function(){
// 	return view('auth.login');
// })->name('login')->middleware('guest');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//---------------------------------
Route::group(['middleware'=>'auth'],function(){
    //despues de registro
    Route::get('postregister','IpController@postregister')->name('postregister');
    
    
	//subir proyectos

	Route::get('publicar_parecido/{id}','PProyectoController@PublicarParecido');


	Route::post('publicar_trabajo/subir','PProyectoController@publicar')->name('subir_proyecto');

    //PARA VISITAR EL PERFIL 
    Route::get('verperfil/{user}','TrabajadoresController@verperfil')->name('verperfil');

	//editar el estado de la notificacion
	Route::post('upnotifi','AplicacionController@upnotifi')->name('upnotifi');


	Route::get('aplicar/{proyecto}','AplicacionController@aplicar')->name('aplicar');
	Route::post('aplicar/savepostu','AplicacionController@savepostu')->name('savepostu');


	//Perfil
	Route::get('perfil','UserController@index')->name('perfil');	
	Route::post('perfil/ciudad','UserController@ciudad');
	Route::post('perfil/saveEstudio','UserController@saveEstudio');
	Route::post('perfil/deleteEstudio','UserController@eliminar_estudio');
	/**PARA GUARDAR LA NUEVA PROFESION**/
	Route::post('perfil/saveProfesion','UserController@saveProfesion');
	/** FIN **/
	/**PARA QUE PUEDA VER SU DNI**/
	Route::post('perfil/ver_dni','UserController@saveVerdni');
	Route::post('perfil/ver_dni_no','UserController@saveVerdni_no');
	/** FIN **/
		/** PARA VER PERFIL EMPLEADOR **/
	
	Route::get('perfil2','UserController@index2')->name('perfil2');
	Route::post('enviar_datos','UserController@enviar_datos');
	Route::post('enviar_datose','UserController@enviar_datose');
	
	/** FIN **/
	Route::post('perfil/saveexperiencia','UserController@save_Experiences');
	Route::post('perfil/deleteexperiencia','UserController@eliminar_certificado');
	Route::post('perfil/save_data','UserController@save_data');
	Route::post('perfil/save_data_juridico','UserController@save_data_juridico');
	Route::post('subir_imagen_usuario','UserController@subir_imagen_usuario');
    Route::post('subir_imagen_usuario2','UserController@subir_imagen_usuario2');
	Route::post('guardahabili','UserController@guardarhabilidades');
	Route::post('perfil/deleteH','UserController@deletehabilidad');
	Route::post('pasardatosmodal','UserController@PasardatosModal');
	Route::post('modificarexperiencia','UserController@ModificarExperiencia');

	Route::post('pasardatosmodal2','UserController@PasardatosModal2');
	Route::post('modificareduacion','UserController@ModificarEduacion');

	//REENVIAR CORREO DE BIENVENIDA
	Route::post('reenviarcorreo','UserController@reenviarcorreo');
	
		//ENVIAR SUGERENCIA
	Route::post('save_sug','UserController@guardasug');

	//ENVIAR COMENTARIO A LABORAPLANET

	Route::post('comentario','UserController@comentario');
	Route::post('pasardatosmodalcomentario','UserController@PasardatosModalComentario');

	//FIN

	//fin perfil

//PARA EL NUEVO CERTIFICAR ALV
//PARA EL NUEVO CERTIFICAR ALV
Route::get('certificarnu','CertificacionController@index')->name('certificarnu');
Route::post('save_certificacion','CertificacionController@save_certificacion');
//FIN DEL NUEVO :v
//FIN DEL NUEVO :v

//PARA LA NUEVA VISTA DE HIJOS ALV
Route::get('formhijos','CertificacionController@formhijos')->name('formhijos');
Route::post('enviaform','CertificacionController@enviaform');

//FIN DEL NUEVO :v


	///----------- SEGURIDAD ----------//
	Route::get('seguridad','SeguridadController@index');
	Route::post('cambio','SeguridadController@enviomail');
	Route::post('confirm','SeguridadController@confirmacion');

	Route::post('cambiocorreo','SeguridadController@enviomailcor');
	Route::post('confirm_correo','SeguridadController@confirmcorreo');
	//---------- FIN DE SEGURIDAD -------//

	//---- CAMBIO DE ESTADO USUARIO----//
	Route::post('cambio1','UserController@e_activo')->name('cambio_estado');
	//-- FIN --- //

	// ------- INVITAR AMIGO - CORREO ----- //
	Route::post('invitar','UserController@invitaramigo')->name('invitar');
	// ------- FIN -------- //


	// -------- VALIDAR CORREO ELECTRONICO ----- //
	Route::post('validar_correo','UserController@validar_correo');
	Route::get('/users/confirmation/{token}','UserController@confirmation')->name('confirmation');
	Route::get('/users/confirmation2/{token}','UserController@confirmation2')->name('confirmation2');
		//PARA EL POSTREGISTER
	Route::post('rconfirmacion','UserController@rconfirmacion');
	// -------- FIN ----------- // 



	Route::get('emplear/{id}','TrabajadoresController@emplear');
	Route::post('agregar_t','TrabajadoresController@agregar_t');
	Route::post('agregar_c','TrabajadoresController@agregar_contacto');
		Route::post('a_postular','TrabajadoresController@postular');
	Route::get('trabajadores_favoritos','trabajadoresFController@index');
	Route::post('trabajadores_favoritos/agregar','trabajadoresFController@agregar');
	Route::post('trabajadores_favoritos/eliminar','trabajadoresFController@eliminar');



	Route::get('trabajadores_certificados','CTrabajadoresController@index');
	Route::post('trabajadores_certificados/certificado','CTrabajadoresController@habilidades');
	Route::post('trabajadores_certificados/habilidadesclases','CTrabajadoresController@habilidadescla');
	
	// ----------------------------------

	Route::get('proyectos','ProyectosController@index')->name('proyect');
	Route::post('borrar/proyecto/{id}','ProyectosController@eliminarProyecto');
	Route::post('modalproyect','ProyectosController@modalproyect');
	Route::post('updateproyect','ProyectosController@updateproyect');
	// -------------------------------------


	Route::get('certificar','CertificarController@index');
	Route::post('certificar/category','CertificarController@habilidad');
	Route::post('certificar/eliminar-categoria','CertificarController@eliminar');
	Route::get('clientes_favoritos',function(){
		return view('clientes_favoritos');
	});

	Route::get('trabajos','TrabajosController@index')->name('trabajos');
	Route::post('usuario-detalle','TrabajosController@usuario_detalle');
	Route::post('proyecto-detalle','TrabajosController@proyecto_detalle');
	Route::post('agregar_publicacion_usuario', 'TrabajosController@agregar_publicacion');
	Route::post('modificar','TrabajosController@Editar');
	Route::post('editar','TrabajosController@Modificar')->name('editar');

	Route::get('download/{doc}','TrabajosController@show')->name('downloadfile');
	Route::post('noitf','TrabajosController@Notif');

	

//conocimientos
	Route::post('conocimiento','UserController@conocimiento');
	Route::post('traecono','UserController@traecono');


	//aspirantes
	Route::get('aspirantes/{id}','AspiranteController@index')->name('aspirantes');
	Route::post('aspirante-detalle','AspiranteController@aspirante_detalle');
	Route::post('aspirante-usuario','AspiranteController@aspirante_usuario');
	Route::post('propuesta-detalle','AspiranteController@propuesta_detalle');
	Route::post('agregar_publicacion_aspirante','AspiranteController@publicacion_aspirante');
	Route::post('noitf-aspi','AspiranteController@Notif_aspi');
	Route::post('editar-aspi','AspiranteController@Modificar_aspi')->name('editar-aspi');
	Route::get('download/{doc}','AspiranteController@show')->name('downloadfile');
	Route::get('down/{doc}','AspiranteController@descar')->name('download');
	Route::post('modalaspirante','AspiranteController@modalaspirante');
	Route::post('modalliberarfondos','AspiranteController@modalliberarfondos');
	Route::post('borrar/aspi/{id}','AspiranteController@eliminarProyecto_aspi')->name('borrar');
	Route::post('guardar-comentario','AspiranteController@guardarc');


	//paypal
	Route::post('paypal','PaypalController@paypal');
	Route::get('paypal_proceso','PaypalController@paypal_proceso')->name('paypal_proceso');
	Route::get('paypal_error','PaypalController@paypal_error')->name('paypal_error');

	Route::get('dinero','DineroController@logindni')->name('dinero');
	Route::post('generar_clave','DineroController@generar_clave');
	Route::post('dinero','DineroController@logindni');
	Route::post('cuentas','DineroController@cuentas');
	Route::post('dinero/eliminar','DineroController@eliminar_m');
	
	Route::get('inicio',function(){
		return view('inicio_login');
	});


	Route::get('pago/{codigo}/{proyecto}','PagoController@index')->name('pago');
    //RUTA PARA EL PAGO EN VISANET - POR TRABAJO - TRABAJADOR
	Route::post('pago/{codigo}/{proyecto}','PagoController@visanet');

	//RUTA PARA EL PAGO EN PAYPAL - POR TRABAJO - TRABAJADOR
	Route::post('pago/{codigo}/{proyecto}/paypal','PagoController@conexion');

	Route::get('pago_p','PagoController@pago_p')->name('pago_p');
	Route::get('pago_e','PagoController@pago_e')->name('pago_e');



	Route::get('planes','PlanesController@index')->name('planes');
    Route::post('planes','PlanesController@visanet');
    
    Route::get('pago_paypal/{id}','PaypalController@pago_paypal_index')->name('pago_paypal');


	//RUTA PARA EL PAGO EN VISANET - URGENTE PROYECTO
	Route::post('pago_paypal/{id}','PaypalController@visanet_u');

	//RUTA PARA EL PAGO PAYPAL - URGENTE PROYECTO
	Route::post('pago_paypal/{id}/paypal_u','PaypalController@pago_paypal');

	Route::get('pago_proceso','PaypalController@pago_proceso')->name('pago_proceso');
	Route::get('pago_error','PaypalController@pago_error')->name('pago_error');
	// Route::get('probar','PagoController@probar');
	Route::get('examen/{id}','CertificarController@irexamen');
	Route::post('examen','CertificarController@evaluar');



	//Chat
	Route::get('lista_chat','ChatController@listarchat')->name('listar_chat');
	Route::get('chat/{id}','ChatController@irchat')->name('chat');
	Route::post('chat2/getchat','ChatController@getchat');
	Route::post('chat2/sendchat','ChatController@sendchat');
	Route::post('file-chat','ChatController@file_chat');
	Route::get('descargar-file-chat/{id}','ChatController@descargar');
	Route::get('listar_trabajador','ChatController@listar_trabajador')->name('listar_trabajador');

    Route::get('datos_linkedin','LoginController@datosl');

	Route::get('video_chat/{id}','ChatController@video_chat');
	Route::post('chat2/selecp','ChatController@selecp');
    Route::post('chat2/voz','ChatController@voz');
    Route::post('chat2/aplicar','ChatController@aplicar');

	//Invitar a amigos 
	Route::get('invitar_gmail','invitar_amigos@index')->name('invitar_gmail');
	Route::post('invitar_gmail','invitar_amigos@contactos_g');
    
    Route::post('eliminar_aa','UserController@eliminar_aa');
    Route::post('eliminar_aaa','UserController@eliminar_aaa');
    
    //verificar_categoria
    Route::post('verificar_categoria','PProyectoController@verificar_categoria');
    
});
