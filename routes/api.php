<?php

use App\Http\Controllers\API\CampaignController;
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

// Campaign
Route::post('/campaign', [CampaignController::class, 'createCampaign']);
Route::get('/campaigns', [CampaignController::class, 'getCampaigns']);
Route::get('/campaign/{id}', [CampaignController::class, 'getCampaignById']);
Route::put('/campaign/{id}', [CampaignController::class, 'updateCampaign']);
Route::delete('/campaign/{id}', [CampaignController::class, 'deleteCampaign']);


