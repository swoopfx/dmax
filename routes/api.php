<?php

use App\Http\Controllers\BooksController as Books;
use App\Http\Controllers\IceController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::resource('books', 'BooksController');

Route::get("external-books", [IceController::class, "externalbookByName"]);
Route::post('v1/books', [Books::class, "store"]);
Route::get('v1/books/{id}', [Books::class, "show"]);
Route::get('v1/books', [Books::class, "index"]);
Route::patch("v1/books/{id}", [Books::class, "update"]);
Route::delete("v1/books/{id}", [Books::class, "destroy"]);