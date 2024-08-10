<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Routes for CategoryProductController
Route::middleware('jwt.auth')->group(function () {
  Route::post("/category-products", [CategoryProductController::class, "store"]);
  Route::get("/category-products", [CategoryProductController::class, "index"]);
  Route::get("/category-products/{id}", [CategoryProductController::class, "show"]);
  Route::put("/category-products/{id}", [CategoryProductController::class, "update"]);
  Route::delete("/category-products/{id}", [CategoryProductController::class, "destroy"]);
});

// Routes for ProductController
Route::middleware('jwt.auth')->group(function () {
  Route::post("/products", [ProductController::class, "store"]);
  Route::get("/products", [ProductController::class, "index"]);
  Route::get("/products/{id}", [ProductController::class, "show"]);
  Route::put("/products/{id}", [ProductController::class, "update"]);
  Route::delete("/products/{id}", [ProductController::class, "destroy"]);
});

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
