<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\ProductController;

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

// Campaign
Route::post('/campaign', [CampaignController::class, 'createCampaign']);
Route::get('/campaigns', [CampaignController::class, 'getCampaigns']);
Route::get('/campaign/{id}', [CampaignController::class, 'getCampaignById']);
Route::put('/campaign/{id}', [CampaignController::class, 'updateCampaign']);
Route::delete('/campaign/{id}', [CampaignController::class, 'deleteCampaign']);

// City
Route::post('/city', [CityController::class, 'createCity']);
Route::get('/cities', [CityController::class, 'getCitis']);
Route::get('/city/{id}', [CityController::class, 'getCityById']);
Route::put('/city/{id}', [CityController::class, 'updateCity']);
Route::delete('/city/{id}', [CityController::class, 'deleteCity']);

// Discount
Route::post('/discount', [DiscountController::class, 'createDiscount']);
Route::get('/discounts', [DiscountController::class, 'getDiscounts']);
Route::get('/discount/{id}', [DiscountController::class, 'getDiscountById']);
Route::put('/discount/{id}', [DiscountController::class, 'updateDiscount']);
Route::delete('/discount/{id}', [DiscountController::class, 'deleteDiscount']);

// Group
Route::post('/group', [GroupController::class, 'createGroup']);
Route::get('/groups', [GroupController::class, 'getGroups']);
Route::get('/group/{id}', [GroupController::class, 'getGroupById']);
Route::put('/group/{id}', [GroupController::class, 'updateGroup']);
Route::delete('/group/{id}', [GroupController::class, 'deleteGroup']);

// Product
Route::post('/product', [ProductController::class, 'createProduct']);
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}', [ProductController::class, 'getProductById']);
Route::put('/product/{id}', [ProductController::class, 'updateProduct']);
Route::delete('/product/{id}', [ProductController::class, 'deleteProduct']);


