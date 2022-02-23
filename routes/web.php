<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clientes', [ClientesController::class, 'index']);

Route::get('exibir-clientes/{id}', [ClientesController::class, 'show']);

Route::post('criar-cliente', [ClientesController::class, 'store']);

Route::put('editar-clientes/{id}', [ClientesController::class, 'update']);

Route::delete('remover-clientes/{id}', [ClientesController::class,'destroy']);