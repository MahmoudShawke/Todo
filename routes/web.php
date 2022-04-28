<?php

use App\Http\Controllers\taskController;
use App\Http\Controllers\userController;
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
    return view('welcome');
});




Route::get('/task/create',[taskController::class,'create']);
Route::post('task/create',[taskController::class,'store']);
Route::get('/task',[taskController::class,'index']);
Route::get('delete/{id}',[taskController::class,'softdelete'])->middleware('checkDate');





Route::get('/user/create',[userController::class,'create']);
Route::post('user/create',[userController::class,'store']);





Route::get('/user',[userController::class,'login']);
Route::post('/user',[userController::class,'dologin']);
Route::get('Logout',[userController::class,'logout']);


// Route::get('User/Login', function () {
//     return view('Users/Login');
// });
// Route::get('User/Register', function () {
//     return view('Users/Create');
// });

