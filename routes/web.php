<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, "index"])->name('user.show');
Route::get('/user/create',[UserController::class, "showFormCreate"])->name('user.create');
Route::post('/user/create',[UserController::class, "create"])->name('user.create');


Route::get('/user/delete/{id}',[UserController::class, "delete"])->whereNumber('id')->name('user.delete');

Route::get('/user/search',[UserController::class, "search"])->name('user.search');

Route::get('/user/update/{id}',[UserController::class, "showFormUpdate"])->whereNumber('id')->name('user.update');

Route::post('/user/update/{id}',[UserController::class, "update"])->whereNumber('id')->name('user.update');


Route::fallback(function(){
    return '404';
});

