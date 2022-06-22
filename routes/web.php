<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UserController;
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
    return view('layouts.login');
});


/////////////////////////........Login Section......///////////////////
Route::get('login',[AdminController::class,'login'])->name('login');
Route::post('verify_login',[AdminController::class,'create'])->name('verify_login');


/////////////////////////........MiddleWare Auth  Section......///////////////////

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');

    /////////////////////////........Users  Section......///////////////////

    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('users_list',[UserController::class,'list'])->name('users_list');
    Route::get('/change/status/{id}', [UserController::class,'ChangeStatus'])->name('change_status');

    /////////////////////////........Categories  Section......///////////////////

    Route::get('categories', [CategoriesController::class,'index'])->name("categories");
    Route::get('add_categories', [CategoriesController::class,'addCategory'])->name("add_categories");
    Route::get('edit/category/{id}', [CategoriesController::class,'editCategory'])->name('edit/category');
    Route::get('categories/delete/{id}',[CategoriesController::class,'destroy'])->name('categories/delete');
    Route::post('submit_categories', [CategoriesController::class,'store'])->name("submit_categories");

    /////////////////////////........SubCategories  Section......///////////////////
    Route::get('sub_categories', [SubCategoriesController::class,'index'])->name("sub_categories");
    Route::get('add/sub_categories', [SubCategoriesController::class,'subCategory'])->name("add/sub_categories");
    Route::post('submit/sub_categories', [SubCategoriesController::class,'store'])->name("submit/sub_categories");
    Route::get('edit/subcategory/{id}', [SubCategoriesController::class,'edit'])->name('edit/subcategory');
    Route::get('sub_categories/delete/{id}',[SubCategoriesController::class,'destroy'])->name('sub_categories/delete');


});
/////////////////////////........logout Section......///////////////////
Route::post('logout',[AdminController::class,'logout'])->name('logout');
