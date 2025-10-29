
# curriculumAPP
<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/favicon.png" width="200"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About curriculumAPP

curriculumAPP is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. curriculumAPP takes the pain out of development by easing common tasks used in many web projects, such as:

##  CurriculumAPP installation requirements

- [Laravel 8](https://laravel.com/docs/8.x).
- [Composer](https://getcomposer.org/).
- [Servidor local: xampp, wampp, laragon, etc...](#).
- [PHP 7.*^](https://www.php.net/downloads.php) Omitir si ya se instalo el servidor local.
- [nodeJS](https://nodejs.org/en/download).
- [Database](#) MySql, MariaDB, PostgreSQL, SQLite, SQL Server, Etc...
- [Git](https://git-scm.com/downloads)  

##  Quick start commands
- [Clonar el repositorio](https://github.com/janluyleonardo/curriculum.git)
>   ```bash
>   git clone https://github.com/janluyleonardo/curriculum.git
- [Intalar dependencias del proyecto con composer](#)
>   ```bash
>   composer install
- [Instalar las dependencias que se usan en el proyecto de npm para entorno de desarrollo](#)
>   ```bash
>   npm install
- [Compilar las dependencias que se usan en el proyecto de npm para entorno de desarrollo](#)
>   ```bash
>   npm run dev
- [Generar llave de aplicacion para que no de error](#)
>   ```bash
>   php artisan key:generate
- [crear archivo .env a partir del archivo de ejemplo](#)
>   ```bash
>   cp .env.example .env
- [Asignar credenciales de conexion a la DB, usuario y contraseña, en archivo .env ](#).
>   ```bash
>   DB_CONNECTION=mysql
>   DB_HOST=127.0.0.1
>   DB_DATABASE=name from db
>   DB_PORT=3306
>   DB_PASSWORD=password from db
>   DB_USERNAME=user from db
- [Generar enlace simbolico de storage para poder manipular imagenes dentro del proyecto](#).
>   ```bash
>   php artisan storage:link
- [Ejecutar migraciones para que se creen las tabla del proyecto ](#).
>   ```bash
>   php artisan migrate
- [opcional ejecutar este comando si se requieren datos de prueba iniciales en la base de datos](#).
>   ```bash
>   php artisan migrate --seed


curriculumAPP is accessible, powerful, and provides tools required for large, robust applications.

## Learning curriculumAPP

curriculumAPP has the most extensive and thorough [documentation](https://laravel.com/docs/8.x) and video tutorial library of all modern web application frameworks, making it a jetstream to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## curriculumAPP Sponsors

- **[Janluyu Leonardo Moreno Coronado](https://github.com/janluyleonardo)**

We would like to extend our thanks to the following sponsors for funding curriculumAPP development. If you are interested in becoming a sponsor, please visit the curriculumAPP [Patreon page](https://patreon.com/janluymoreno?utm_medium=unknown&utm_source=join_link&utm_campaign=creatorshare_creator&utm_content=copyLink).

<!-- ### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)** -->

## Contributing

Thank you for considering contributing to the curriculumAPP; The contribution guide can be found in the [curriculumAPP documentation](https://laravel.com/docs/8.x/contributions).

## Code of Conduct

In order to ensure that the curriculumAPP community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/8.x/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within curriculumAPP, please send an e-mail to Taylor Otwell via [janluy.morneo@gmail.com](mailto:janluy.morneo@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
