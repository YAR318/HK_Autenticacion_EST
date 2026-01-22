<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Ruta temporal para debugging - captura el JSON crudo de Evolution API
Route::post('/debug-webhook', function (Request $request) {
    $data = $request->all();
    
    Log::info('=== WEBHOOK DEBUG - Evolution API v1.7.4 ===');
    Log::info('Headers:', $request->headers->all());
    Log::info('Body:', $data);
    Log::info('JSON:', [$request->getContent()]);
    
    // Guardar en archivo también
    file_put_contents(
        storage_path('logs/webhook_debug.json'),
        json_encode([
            'timestamp' => now()->toDateTimeString(),
            'headers' => $request->headers->all(),
            'body' => $data,
            'raw' => $request->getContent()
        ], JSON_PRETTY_PRINT) . "\n\n",
        FILE_APPEND
    );
    
    return response()->json(['success' => true, 'message' => 'Debug data captured']);
});
