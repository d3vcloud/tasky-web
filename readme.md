# tasky-web

Aplicación web para gestionar proyectos y tareas.

[![Alt text](https://img.youtube.com/vi/Kk2b4PATMRg/0.jpg)](https://www.youtube.com/watch?v=Kk2b4PATMRg)

## Instalaciones

Antes de ejecutar el software, debes tener instalado lo siguiente:

* PHP 7.3.29
* Laravel 5.4
* Composer 2.1.6
* MySQL 8

## Configuración

* En tu editor favorito, abres el proyecto y en la carpeta app/Console ubica el archivo Kernel.php y comenta todo el código que se encuentra en el método **schedule()**.
* Abre una terminal y ejecuta el siguiente comando para instalar las dependencias:
```
composer install
```
* Crea la base de datos en tu cliente de MySql preferido.
* Copia todo el contenido del archivo **.env.example** a **.env** y cambia el valor de los siguientes variables:
```
APP_NAME=NOMBRE_APP
DB_DATABASE=NOMBRE_DE_TU_BD
DB_USERNAME=USUARIO_DE_TU_BD
DB_PASSWORD=CONTRASEÑA_DE_TU_BD
MAIL_USERNAME=EMAIL_PARA_NOTIFICACIONES
MAIL_PASSWORD=CONTRASEÑA_EMAIL
MAIL_FROM_ADDRESS=EMAIL_PARA_NOTIFICACIONES
MAIL_FROM_NAME=NOMBRE_REMITENTE
```
* Ejecuta el comando para ejecutar migraciones(creación de tablas):
```
php artisan migrate
```
*  Crea el enlace simbólico para subir foto con el comando:
```
php artisan storage:link
```
* Agrega las dependencias faltantes con:
```
php artisan vendor:publish
```
* Genera la clave de cifrado con:
```
php artisan key:generate
```
* Ahora ya puedes descomentar la función del primer paso y ejecutar el siguiente comando para iniciar el server:
```
php artisan serve
```

## Historial de versiones

* 0.1
    * Initial Release