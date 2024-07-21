<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

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
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
## Larvael version 10.x
# ONLINE BOOK LIBRARY
API Endpoints:
Books:
Create, retrieve, update, and delete operations.
Authors:
Create, retrieve, update, and delete operations.
Authentication:
Implement JWT-based authentication for secure API access.
Validation and Error Handling:
Validate requests for books and authors.
Provide clear error messages.
Database:
Design MySQL database schema for books and authors.
Use Laravel’s Eloquent ORM for database interactions.
Documentation:
Optionally document API endpoints.

User Interface:
Home Page:
Display list of books with titles and authors.
Book Details Page:
Show detailed information about specific books.
Author Details Page:
Display detailed information about authors.
User Authentication:
Implement basic login functionality.
Form Handling:
Create simple forms for managing books and authors.
Bonus Points
Search Functionality:
Implement search functionality for books and authors.
Testing:
Add unit and integration tests for API endpoints.

Eloquent API Resources allow you to transform your model data into a custom format for API responses. Let's create an API Resource for the Product model to control how the Product data is presented in the API responses.

To generate an API Resource for the Product model, run the following Artisan command.
php artisan make:resource Product
In the toArray() method, you define the structure of the response array by specifying the attributes to include from the Product model. You can add additional attributes or customize the response format as needed.

Now, I have used POSTMAN API for testing purposes, Postman is a collaboration platform for API development. Postman's features simplify each step of building an API and streamline collaboration so you can create better APIs faster.

Here I have added some screenshots with of the postman in the folder attached directory  for your better understanding on how to test the API.
## API ENDPOINTS
Auth
http://127.0.0.1:8000/api/register
http://127.0.0.1:8000/api/login
http://127.0.0.1:8000/api/refresh
http://127.0.0.1:8000/api/logout
Books Api
Endpoint
PUT http://127.0.0.1:8000/api/updatebooks/2
POST http://127.0.0.1:8000/api/books
GET http://127.0.0.1:8000/api/allbooks
DELETE http://127.0.0.1:8000/api/deletebook/2
Author
POST http://127.0.0.1:8000/api/sendauthor
GET http://127.0.0.1:8000/api/allauthor
PUT http://127.0.0.1:8000/api/author/3
DELETE
http://127.0.0.1:8000/api/deleauthor/4


To run locally and producion
composer install
npm install
To run the vue js application using the vite. use the command
npm run dev
To run the application we can either use a virtual host or we can use serve command
php artisan serve

You may need to create an account or login to the application to view and update the crud application.
http://127.0.0.1:8000/login
http://127.0.0.1:8000/books

http://127.0.0.1:8000/authors