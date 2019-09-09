<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<h1 align="center">Proyecto Usuarios</h1>

## Esta aplicacion es para agregar pasatiempos, configurar perfiles, agregar nuevos usuarios. Tener permisos con roles. Esta programada con Laravel 5.6. 

##Instrucciones

1. Clonar el repositorio en la carpeta www(wampserver), httdocs(xampp).
2. Ejecutar la sentencia sql que esta dentro de la carpeta de la raiz del proyecto llamada ScriptBBDD en php admin de msql.
3. Instalar composer (https://getcomposer.org/)
4. Abrir la consola de windows, linux o la de su preferencia en la carpeta del proyecto descargado en el punto 1.
5. Teclear: php artisan migrate:refresh -seed. Para ejecutar el seeders(roles).
6. Teclear: php artisan migrate. Para ejecutar las migraciones.
7. Teclear: php artisan serve. Para ejecutar el proyecto.
8. Abir el navegador de su preferencia y teclear en la url: localhost:8000
9. Iniciar sesion con las siguientes credenciales:
    email: admin@admin.com
    password: 123456

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
