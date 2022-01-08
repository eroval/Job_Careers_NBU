<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingsController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Jobs
  // Create
  Route::get('/create-jobs/', [JobListingsController::class, 'create']);
  Route::post('store-jobs', [JobListingsController::class,'store']);

  // View
//   Route::get('/', [JobListingsController::class, 'loadStart']);
//   Route::get('/article/{id}', [JobListingsController::class, 'loadPage']);

//Categories
    //Create
    Route::post('create-categories', [CategoriesController::class], 'store');
