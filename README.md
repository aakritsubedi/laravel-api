<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Making API using laravel api 

- **Setup the Laravel Application**
To get started, you have to create a Laravel application. To do this you have to run the following command in your terminal:
```shell
$ composer create-project --prefer-dist laravel/laravel lara-api
```
Next, change your current directory to the root folder of the project:
```shell
$ cd api-project
```
Next, start up the Laravel server if it’s not already running:
```shell
$ php artisan serve
```
You will be able to visit your application on https://localhost:8000
![Localhost](./docs/images/initial_project.png)

Next, create a new [database](https://www.mysqltutorial.org/mysql-create-database/) for your application.

### Writing your first API
Proceed to the routes directory and open the api.php file and create the endpoints that will reference the methods.
```php
Route::get('/login', function() {
    return ['message' => 'Hello Aakrit Subedi'];
});
```
**Note:** All routes in api.php are prefixed with /api by default.  

Now, visit http://127.0.0.1:8000/api/login
![First API](./docs/images/first_api.png)

### CRUD API for students record:
CRUD is basically 
- get all students record **[GET]** 
- Add/Create the student record **[POST]**
- get the single student record **[GET]**
- Update the single student record **[PUT/PATCH]**
- Delete the student record **[DELETE]**

### Understanding our Application
We will be building a CRUD API. CRUD means Create, Read, Update, and Delete. Our API will have the following endpoints:

- `GET /api/students` will return all students and will be accepting `GET` requests.
- `POST /api/students` will create a new student record and will be accepting `POST` requests.
- `GET /api/students/{id}` will return a student record by referencing its id and will be accepting `GET` requests.
- `PUT /api/students/{id}` will update an existing student record by referencing its id and will be accepting `PUT` requests.
- `DELETE /api/students/{id}` will delete a student record by referencing its id and will be accepting `DELETE` requests.