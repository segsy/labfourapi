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
<strong># ONLINE BOOK LIBRARY</strong>
<p>API Endpoints:</p>
<strong>Books:</strong>
<p>Create, retrieve, update, and delete operations.</p>
<strong>Authors:</strong>
<p>Create, retrieve, update, and delete operations.</p>
<strong>Authentication:</strong>
<p>Implement JWT-based authentication for secure API access.</p>
<p>Validation and Error Handling:</p>
<p>Validate requests for books and authors.</p>
<p>Provide clear error messages.</p>
<strong>Database:</strong>
<p>Design MySQL database schema for books and authors.</p>
<p>Use Laravel’s Eloquent ORM for database interactions.</p>
<strong>Documentation:</strong>
<p>Optionally document API endpoints.</p>

<strong>User Interface:</strong>
<strong>Homepage:</strong>
<p>Display list of books with titles and authors.</p>
<strong>Book Details Page:</strong>
<p>Show detailed information about specific books.</p>
<strong>Author Details Page:</strong>
<p>Display detailed information about authors.</p>
<strong>User Authentication:</strong>
<p>Implement basic login functionality.</p>
<strong>Form Handling:</strong>
<p>Create simple forms for managing books and authors.</p>

<strong>Search Functionality:</strong>
<p>Implement search functionality for books and authors.</p>
<strong>Testing:</strong>
<p>Add unit and integration tests for API endpoints.</p>

<p>Eloquent API Resources allow you to transform your model data into a custom format for API responses. Let's create an API Resource for the Product model to control how the Product data is presented in the API responses.</p>

<p>To generate an API Resource for the Product model, run the following Artisan command.</p>
<p>php artisan make:resource Product</p>
<p>In the toArray() method, you define the structure of the response array by specifying the attributes to include from the Product model. You can add additional attributes or customize the response format as needed.</p>

<p>Now, I have used POSTMAN API for testing purposes, Postman is a collaboration platform for API development. Postman's features simplify each step of building an API and streamline collaboration so you can create better APIs faster.</p>

<p>Here I have added some screenshots with of the postman in the folder attached directory  for your better understanding on how to test the API.</p>
<strong>## API ENDPOINTS</strong>
<strong>Auth</strong>
<li>http://127.0.0.1:8000/api/register</li>
<li>http://127.0.0.1:8000/api/login</li>
<li>http://127.0.0.1:8000/api/refresh</li>
<li>http://127.0.0.1:8000/api/logout</li>
<strong>Books Api</strong>
<strong>Endpoint</strong>
<li>PUT http://127.0.0.1:8000/api/updatebooks/2</li>
<li>POST http://127.0.0.1:8000/api/books</li>
<li>GET http://127.0.0.1:8000/api/allbooks</li>
<li>DELETE http://127.0.0.1:8000/api/deletebook/2</li>
<strong>Author</strong>
<li>POST http://127.0.0.1:8000/api/sendauthor</li>
<li>GET http://127.0.0.1:8000/api/allauthor</li>
<li>PUT http://127.0.0.1:8000/api/author/3</li>
<strong>DELETE</strong>
<li>http://127.0.0.1:8000/api/deleauthor/4</li>


<p>To run locally and producion</p>
<p>composer install</p>
<p>npm install</p>
<p>To run the vue js application using the vite. use the command</p>
<p>npm run dev</p>
<p>To run the application we can either use a virtual host or we can use serve command</p>
<p>php artisan serve</p>

<p>You may need to create an account or login to the application to view and update the crud application.</p>
<li>http://127.0.0.1:8000/login</li>
<li>http://127.0.0.1:8000/books</li>

<li>http://127.0.0.1:8000/authors</li>