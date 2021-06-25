## Project Setup

Before start working you should copy the content of `.env.example` file into `.env` file and run the following commands.

### Downloads and install all `PHP` dependencies
```
composer install
```

### Downloads and install all `JavaScript` dependencies
```
npm install
```

### Generates `Laravel` application key
```
php artisan key: generate
```
### Create Database

### Run Migration
php artisan migrate

### To Create Sample Database
php artisan db:seed --class UserSeeder

### Add Companies list (not Required)
php artisan db:seed --class CompanySeeder
php artisan db:seed --class EmployeeSeeder

### Spins up a development server and host your application
```
php artisan serve
```

After that, you should be able to access the project on your `http://127.0.0.1:8000/`.

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

