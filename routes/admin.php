<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('role:admin')->name('admins.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    // alumni user
    Route::prefix('alumni')->name('alumnis.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('{id}/detail',[UserController::class,'show'])->name('show');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::get('{id}/edit',[UserController::class,'edit'])->name('edit');
        Route::post('{id}/update',[UserController::class,'update'])->name('update');
    });
});