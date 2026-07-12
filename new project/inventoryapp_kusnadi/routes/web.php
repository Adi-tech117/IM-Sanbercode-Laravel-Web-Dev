<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;

Route::get('/', [DashboardController::class, "home"]);
Route::get('/register', [FormController::class, "register"]);
Route::get('/Biodata', [FormController::class, "Biodata"]);
Route::post('/welcome', [FormController::class, "welcome"]);



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
