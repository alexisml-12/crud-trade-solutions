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
//Crear tienda
Route::post("/add-store", [CrudController::class, "createStore"])->name("crud.createstore");
//Modificar tienda
Route::post("/edit-store", [CrudController::class, "editStore"])->name("crud.editstore");
//Eliminar tienda
Route::post("/delete-store", [CrudController::class, "deleteStore"])->name("crud.deletestore");

//Vista producto
Route::get("/products", [CrudController::class, "products"])->name("crud.products");
//Crear producto
Route::post("/add-product", [CrudController::class, "createProduct"])->name("crud.createProduct");
//Modificar producto
Route::post("/edit-product", [CrudController::class, "editProduct"])->name("crud.editProduct");
//Eliminar producto
Route::get("/delete-product-{sku}", [CrudController::class, "deleteProduct"])->name("crud.deleteProduct");