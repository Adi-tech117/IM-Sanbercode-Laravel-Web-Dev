<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

Route::get('/', [DashboardController::class, "home"])->name('home')->middleware('auth');

Route::get('/profile', [ProfileController::class, "getProfile"])->middleware('auth');
Route::put('/profile', [ProfileController::class, "update"])->middleware('auth');
Route::post('/profile', [ProfileController::class, "store"])->middleware('auth');



Route::get('/register', [FormController::class, "register"])->name('post');
Route::get('/Biodata', [FormController::class, "Biodata"]);
Route::post('/welcome', [FormController::class, "welcome"]);


Route::middleware(['auth', 'admin'])->group(function () {

    //CRUD Category

    //C=>Create Data
    //rute mengarah ke form tambah category
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);

    //R=> Read Data
    //tampil semua data

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);

    //U=> Update Data

    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);

    //D=> Delete Data

    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
  
});



//CRUD Products
Route::resource('/product', ProdukController::class);

Route::middleware(['guest'])->group(function(){

    //Auth
    //Register
    Route::get('/register', [AuthController::class, 'formregister']);
    Route::post('/register', [AuthController::class, 'register']);

    //login
    Route::get('/login', [AuthController::class, 'formlogin']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');

});

//Logout
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function(){
    //get List Transaction

    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/create', [TransactionController::class, 'create']);
    Route::post('/transactions', [TransactionController::class, 'store']);

    //Admin

    Route::get('/transactions/{id}', [TransactionController::class, 'edit']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);


});

