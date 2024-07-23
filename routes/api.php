<?php

use App\Http\Controllers\API\HomeController;
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

Route::get('/settings', [HomeController::class, 'settings']);
Route::get('/main-banner', [HomeController::class, 'mainBanner']);
Route::get('/stats', [HomeController::class, 'stats']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/clients', [HomeController::class, 'clients']);
Route::get('/projects', [HomeController::class, 'projects']);
Route::get('/about-us', [HomeController::class, 'aboutus']);

Route::post('/contact', [HomeController::class, 'contact']);
