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
  Route::get('/', [JobListingsController::class, 'loadStart']);
  Route::get('/jobs/{id}', [JobListingsController::class, 'loadPage']);

  // Update
  Route::get('/edit-jobs/{id}', [JobListingsController::class, 'editPage']);
  Route::patch('/update-jobs/{id}', [JobListingsController::class, 'updateJobs']);

  // Search
  Route::get('/search-jobs/', [JobListingsController::class, 'searchPage']);
  Route::get('/search-result/', [JobListingsController::class, 'search']);

  // Delete
  Route::get('/confirm-delete-jobs/{id}', [JobListingsController::class, 'deletePage']);
  Route::delete('/delete-jobs/{id}',[JobListingsController::class, 'delete']);

//Categories
  // View
  Route::get('/categories', [CategoriesController::class, 'loadStart']);
  Route::get('/categories/{id}', [CategoriesController::class, 'loadPage']);