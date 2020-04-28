# Formato de planes
- Los planes tienen en una sola columna "price", un conjunto de precios, separados X veces
    - Si, es "5" entonces muestra 5$
    - Si, es "20,12,4" entonces muestra 20$, otro 12$ y otro 4$

# Estructura de componentes
- Se esta usando Vue solo para el chat, aparentemente no se usa en mas ningun otro sitio
- El componente <general> es el componente principal de los scripts de Vue
- El archivo app.js posee el conjunto de componentes a usar

# Dependencias de mensajes
- TODO

# Requerimientos
- Chat bot

- [ ] Los mensajes en el chat deben estar vinculados con el proyecto y el colaborador. Por ejemplo el siguiente usuario es diseñador web , y no ha postulado al proyecto “Diseñador gràfico” pero el empleador inicia una conversación con él luego de buscar perfiles, este usuario Raúl Gonzales no debería aparecer en la conversación de mi otro proyecto que es “Traductor”. Esta conversación solo debe aparecer si selecciono el proyecto al que él postuló y si no tiene un proyecto como en este caso no debería mostrar ningúna opción en la lista.
- [ ] En la siguiente sección desde el icono de notificaciones de chat cuando pico al nombre me lleva al perfil del usuario , est debe ser similar a como lo maneja Facebook, click en cual parte del área sombreada me lleva a la ventana de chat. Y ya cuando estoy en la ventana de chat si pico a la foto , entonces recién me lleva al perfil , el cual debe mostrarse sin ocultarse la ventana de chat.
- [ ] Los mensajes leìdos no se estàn visualizando como leído por parte de ninguno (empleador o colaborador). 
- [ ] En la lista de proyectos de la ventana de chat Se están mostrando todos los proyectos, y no está mal, pero la idea sería que se muestre la conversación correspondiente al proyecto , adicionalmente no deben haber botones  ni precios (porque no ha aplicado a ningún proyecto, no hay propuesta económica y para contratar  se requiere asignarlo a algún proyecto). Adicionalmente recordar que el usuario puede ser empleador y colaborador a la vez. Entonces se debe ver la forma de que se distingan claramente los proyectos que son de publicación y los proyectos que son de postulación. En este print por ejemplo: Rosario Alvarez es empresaria e intentó contactar a la usuaria coyasumak, pero a esta le aparece Rosario con la posibilidad de contratar y puede contratarla incluso para un proyecto que ella no ha postulado, es necesario corregir lo antes posible.
- [ ] También para el caso  cuando un colaborador no es notificado para un proyecto , pero él busca y aplica en el chat debe figurar el nombre del proyecto, en este caso El usuario coyasumak aplicó a un proyecto denominado “ marketing digital”, sin ser notificada (lo cual es válido), pero en la lista de requerimientos  del chat no se muestra el proyecto o requerimiento al cual está postulando.
- [ ] También si labochat envía mensaje para un colaborador respecto a un requerimiento publicado , se debe enfocar el proyecto asociado a esta notificación (actualmente me muestra la lista y no se sabe a qué proyecto pertenece la propuesta) y su respectivo presupuesto (proveniente de la publicación) , pero no debe llevar el botón contratar, en este caso debe llevar el botón postular (porque la notificación fue para colaborador). En este ejemplo me notifican como colaboradora , pero me aparece el botón contratar y no me muestra el proyecto asociado.
- [ ] Si pico a esa área tambien debería poder ir a la conversación.
- [ ] Como colaborador Click sobre la foto del empleador (logo )o el nombre me debe llevar a su perfil de empleador.
- [ ] Como colaborador Click sobre el nombre del proyecto , me debe llevar al detalle del proyecto quizá colocar un enlace sobre el nombre de tal forma que el colaborador pueda ir a ver el detalle , También como colaborador debo ver el botón aplicar o postular en lugar de contratar y el precio que debo ver , es el precio que publicó el empleador al momento dela creación del requerimiento. La descripción del proyecto solo lo puedo ver en la lista de proyectos publicados (desde la búsqueda del menu inicio) , habría que ver la forma de apuntar al mismo contenido.
- [ ] Como empleador, click  a la foto o al nombre del colaborador me debe llevar a su perfil de colaborador. Así mismo el precio que veo es de la postulación (propuesta económica del colaborador).
- [ ] Como empleador click sobre el nombre del proyecto , me debe llevar a la propuesta del colaborador. La propuesta actualmente  , solo lo puedo ver desde la opción emplear/mis requerimientos, picas a la personita y allí se encuentra el detalle de la propuesta, también sería cosa de enlazar al mismo contenido
- [ ] La propuesta actualmente  , solo lo puedo ver desde la opción emplear/mis requerimientos, picas a la personita y allí se encuentra el detalle de la propuesta, también sería cosa de enlazar al mismo contenido 
- [ ] En la siguiente pantalla , se debería mostrar solo los proyectos a los que aplica el trabajador.
- [ ] A nivel móviles, el envío del chat no funciona con la tecla enter. 

# Consultas la BDD
- Relaciones de usuarios

    - Poseen una clave foranea con user_cono y solici_men


<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
