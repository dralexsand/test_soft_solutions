<?php

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::prefix('cars')->group(function () {

    Route::get('/', ['App\Http\Controllers\Api\v1\CarsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\CarsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});


Route::prefix('filter')->group(function () {
    Route::post('/data', ['App\Http\Controllers\Api\v1\FilterController', 'filteredData']);
    Route::post('/panel', ['App\Http\Controllers\Api\v1\FilterController', 'filterPanel']);
    Route::get('/panel_init', ['App\Http\Controllers\Api\v1\FilterController', 'filterPanelInit']);
    Route::get('/brand/{brand_id}', ['App\Http\Controllers\Api\v1\FilterController', 'getModelsByBrand']);


});


Route::prefix('brands')->group(function () {

    Route::get('/', ['App\Http\Controllers\Api\v1\BrandsController', 'getBrands']);
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'getBrand'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'updateBrand'])->where(['id' => '[0-9]+']);
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'deleteBrand'])->where(['id' => '[0-9]+']);
});





/*Route::get('cars', ['App\Http\Controllers\Api\v1\CarController', 'getCars']);
Route::get('cars/{car_id}', ['App\Http\Controllers\Api\v1\CarController', 'getCar']);

Route::patch('cars/{car_id}', ['App\Http\Controllers\Api\v1\CarController', 'updateCar']);
Route::delete('cars/{car_id}', ['App\Http\Controllers\Api\v1\CarController', 'deleteCar']);

Route::post('cars/filter', ['App\Http\Controllers\Api\v1\CarController', 'filter']);*/

//Route::apiResource('cars', 'App\Http\Controllers\Api\v1\ApiCarController');

//Route::apiResource('cars', 'App\Http\Controllers\Api\v1\CarController');

/*Route::post('filters', ['App\Http\Controllers\Api\v1\CarController', 'applyFilters']);
Route::get('list_filters', ['App\Http\Controllers\Api\v1\CarController', 'listFilters']);*/
