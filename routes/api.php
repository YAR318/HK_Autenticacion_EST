<?php

use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - HK_Autenticacion_EST
|--------------------------------------------------------------------------
|
| Rutas para recibir mensajes de WhatsApp desde n8n (Evolution API)
|
*/

// Ruta para recibir mensajes de WhatsApp desde n8n
Route::post('/messages', [MessageController::class, 'store']);

// Ruta de health check
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'project' => 'HK_Autenticacion_EST',
        'timestamp' => now()->toDateTimeString()
    ]);
});
