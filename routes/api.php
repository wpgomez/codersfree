<?php

use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\CatalogpageController;
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

Route::group(['middleware' => ['cors']], function () {
    Route::get('catalogs', [CatalogController::class, 'index']);

    Route::get('catalogs/{catalog}', [CatalogController::class, 'show']);

    Route::get('catalogs/{catalog}/pages', [CatalogController::class, 'pages']);

    Route::get('catalogpages/{catalogpage}', [CatalogpageController::class, 'show']);
});
