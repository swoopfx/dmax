<?php

use App\Http\Controllers\BooksController;
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


Route::resource('books', 'BooksController');

Route::get("external-books", [IceController::class, "externalbookByName"]);

// Route::prefix('v1/books')->group(function () {
//     Route::get('/', [ProjectController::class, 'apiWithoutKey']);
//     Route::post('apiwithkey', [ProjectController::class, 'apiWithKey']);
//     Route::patch("/");
//     // Route::delete()
// });