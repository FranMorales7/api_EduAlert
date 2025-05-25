# 🧠 EduAlert Backend

Este es el **backend** del sistema **EduAlert**, una plataforma desarrollada con Laravel 12 para la gestión de incidentes escolares, usuarios, clases y notificaciones en tiempo real. Este proyecto sirve como API REST para el frontend desarrollado en Next.js.

---

## 🚀 Tecnologías y dependencias

- [Laravel 12](https://laravel.com/docs/12.x) — Framework PHP moderno y elegante
- [Sanctum](https://laravel.com/docs/12.x/sanctum) — Autenticación basada en tokens
- [Pusher](https://pusher.com/) + Laravel Echo — Comunicación en tiempo real vía Websockets
- [PHP 8.2+](https://www.php.net/releases/8.2/en.php)
- [Pail](https://github.com/laravel/pail) — Visualizador de logs en tiempo real
- [Laravel Pint](https://laravel.com/docs/12.x/pint) — Formateador de código
- [PHPUnit](https://phpunit.de/) — Testing automatizado

---

## 📁 Estructura del proyecto

```bash
BACK-EDU/
├── app/
│   ├── Events/
│   │   └── NewNotificationCreated.php     # Evento emitido al crear una notificación
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── ClassRoomController.php
│   │   │   ├── GroupController.php
│   │   │   ├── IncidentController.php
│   │   │   ├── LessonController.php
│   │   │   ├── ManagerController.php
│   │   │   ├── StudentController.php
│   │   │   ├── TeacherController.php
│   │   │   ├── TripController.php
│   │   │   └── UserController.php
│   │   └── Middleware/                   # Middleware personalizados o globales
│   ├── Models/
│   │   ├── ClassRoom.php
│   │   ├── Group.php
│   │   ├── Incident.php
│   │   ├── Lesson.php
│   │   ├── Manager.php
│   │   ├── Student.php
│   │   ├── Teacher.php
│   │   ├── Trip.php
│   │   └── User.php
│   └── Providers/                        # Proveedores de servicios
├── bootstrap/                            # Configuración de arranque del framework
├── config/                               # Archivos de configuración
├── database/                             # Migraciones, seeders y factories
├── public/                               # Raíz pública del proyecto (index.php)
├── resources/                            # Vistas, assets y lenguajes
├── routes/
│   └── api.php                           # Definición de rutas del backend (API REST)
├── storage/                              # Logs, caché y archivos temporales
├── tests/                                # Tests de la aplicación
├── .env.example                          # Archivo de ejemplo de entorno
├── composer.json                         # Dependencias PHP
└── artisan                               # CLI de Laravel
```

---

## ⚙️ Instalación y configuración
 ### Clona el repositorio
 git clone https://github.com/FranMorales7/api_EduAlert.git
 cd api_EduAlert

 ### Instala dependencias
 composer install

 ### Copia el archivo de entorno
 cp .env.example .env

 ### Genera la clave de aplicación
 php artisan key:generate

 ### Configura la base de datos en el archivo .env
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=edu_alert
 DB_USERNAME=root
 DB_PASSWORD=

 ### Ejecuta las migraciones
 php artisan migrate

 ### (Opcional) Ejecuta los seeders
 php artisan db:seed

 ### Inicia el servidor
 php artisan serve

---

## 🔐 Autenticación
La autenticación se gestiona con Laravel Sanctum. Los usuarios obtienen un token tras iniciar sesión, que debe enviarse en el header Authorization: Bearer {token} para acceder a las rutas protegidas.

---

## 👨‍💻 Autor
Nombre: Francisco Morales

Correo: lopezmoralesfrancisco18@gmail.com

Repositorio Frontend: [Front-End/EduAlert](https://github.com/FranMorales7/front-EduAlert)

