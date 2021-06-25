<?php
use App\Http\Controller\CompanyController;
use App\Http\Controller\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return Redirect::to('home');
    }
    return Redirect::to('login');
});

// To enable Registration
//Auth::routes();

// Disable Registeration new user
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('company', 'App\Http\Controllers\CompanyController');
    Route::resource('employee', 'App\Http\Controllers\EmployeeController');
});
