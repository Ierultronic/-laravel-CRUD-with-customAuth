<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
//login and authentication process
Route::get('/login', [UserController::class,'login'])->middleware('loggedIn');
Route::get('/register', [UserController::class,'register'])->middleware('loggedIn');
Route::post('/register-user', [UserController::class,'regUser'])->name('regUser');
Route::post('/login-user', [UserController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [UserController::class,'logout']);
Route::get('/addUser', [UserController::class,'addUser'])->middleware('isLoggedIn');
Route::post('/save-user', [UserController::class,'saveUser'])->middleware('isLoggedIn');
Route::get('/listUser',[UserController::class,'ListUser'])->middleware('isLoggedIn');
Route::get('/editUser/{id}', [UserController::class,'EditUser'])->middleware('isLoggedIn');
Route::get('/deleteUser/{id}', [UserController::class,'deleteUser'])->middleware('isLoggedIn');
Route::get('/updateUser/{id}', [UserController::class,'UpdateUser'])->middleware('isLoggedIn');
