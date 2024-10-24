<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/telegram/webhook', [\App\Services\TelegramBotService\TelegramBotService::class, 'handleWebhook']);

Route::post('/mercadopago/webhook', [\App\Http\Controllers\WebhookController::class, 'mercadoPagoWebhook']);
