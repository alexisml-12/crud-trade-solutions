<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Vista Tiendas
Route::get("/", [CrudController::class, "index"])->name("crud.index");
//Vista producto
Route::get("/products", [CrudController::class, "products"])->name("crud.products");
//Crear tienda
Route::post("/add-store", [CrudController::class, "createStore"])->name("crud.createstore");
//Modificar tienda
Route::post("/edit-store", [CrudController::class, "editStore"])->name("crud.editstore");
//Eliminar tienda
Route::post("/delete-store", [CrudController::class, "deleteStore"])->name("crud.deletestore");