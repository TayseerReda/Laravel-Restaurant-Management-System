<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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



Route::get('/',[HomeController::class,"index"]);
Route::get('/redirects',[HomeController::class,"redirects"]);
Route::get('/users',[AdminController::class,"users"])->name('users');
Route::get('/deleteuser/{id}',[AdminController::class,"deleteuser"])->name('delete');
Route::get('/foodmenu',[AdminController::class,"foodmenue"])->name('food.menu');
Route::post('/addfood',[AdminController::class,"addfood"])->name('addfood');
Route::get('/foods/delete/{id}',[AdminController::class,"deletefood"])->name('foods.delete');
Route::get('/foods/edit/{id}',[AdminController::class,"editfood"])->name('foods.edit');
Route::post('/foods/update/{id}',[AdminController::class,"updatefood"])->name('foods.update');
Route::post('/reservation',[AdminController::class,"insert_reservation"])->name('reservation');
Route::get('/view/reservation',[AdminController::class,"view_reservation"])->name('reservations.view');
Route::get('/chefs',[AdminController::class,"chefs"])->name('chefs');
Route::post('/upload/chefs',[AdminController::class,"upload_chef"])->name('upload.chefs');
Route::get('/edit/chef/{id}',[AdminController::class,"editchef"])->name('chef.edit');
Route::get('/delete/chef/{id}',[AdminController::class,"deletechef"])->name('chef.delete');
Route::post('/add/card/{id}',[HomeController::class,"addtocard"])->name('addtocart');
Route::get('/show/card/{id}',[HomeController::class,"showcard"])->name('show.card');
Route::get('/delete/card/{id}',[HomeController::class,"deletecard"])->name('card.delete');
Route::post('/confirm/order/{id}',[HomeController::class,"order"])->name('confirm.order');
Route::get('/view/order',[AdminController::class,"view_order"])->name('view.order');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
