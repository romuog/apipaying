<?php

use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\CostCenterController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\TypeExpenseController;
use App\Http\Controllers\Api\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']); //testado
Route::post('register', [AuthController::class, 'register']);//testado

Route::group([
    'middleware' => 'auth',
    'prefix' => 'v1'
], function () {
    Route::post('logout', [AuthController::class, 'logout']); // testado
    Route::post('refresh', [AuthController::class, 'refresh']);//testado
    Route::post('me', [AuthController::class, 'me']); //testado


    /**
     * Rotas Crud do Centro de Custo
     */
    Route::get('/costcenter',[CostCenterController::class , 'index']); //TESTADA VIA SERVICE LAYER
    Route::get('/costcenter/{id}',[CostCenterController::class , 'show']); //TESTADA VIA SERVICE LAYER
    Route::post('/costcenter',[CostCenterController::class , 'store']); //TESTADA VIA SERVICE LAYER
    Route::put('/costcenter/{id}/update',[CostCenterController::class , 'update']);
    Route::delete('/costcenter/{id}',[CostCenterController::class , 'destroy']);

    /**
     * Rotas Crud Tipo de Despesa
     */
    Route::get('/typeexpense',[TypeExpenseController::class , 'index']); //testado via service
    Route::get('/typeexpense/{id}',[TypeExpenseController::class , 'show']);//testado via service
    Route::post('/typeexpense',[TypeExpenseController::class , 'store']);//testado via service
    Route::put('/typeexpense/{id}',[TypeExpenseController::class , 'update']);//testado via service
    Route::delete('/typeexpense/{id}',[TypeExpenseController::class , 'destroy']);//testado via service

    /**
     * Rotas Crud do Fornecedor
    */

    Route::get('/providers',[ProviderController::class , 'index']);//testado via service
    Route::get('/providers/{id}',[ProviderController::class , 'show']);//testado via service
    Route::post('/providers',[ProviderController::class , 'store']);//testado via service
    Route::put('/providers/{id}',[ProviderController::class , 'update']);//testado via service
    Route::delete('/providers/{id}',[ProviderController::class , 'destroy']);//testado via service

    /**
     * Rotas Despesa
     */
    Route::get('/expense',[ExpenseController::class , 'index']);//testado via service
    Route::get('/expense/{id}',[ExpenseController::class , 'show']);//testado via service
    Route::post('/expense',[ExpenseController::class , 'store']);//testado via service
    Route::put('/expense/{id}',[ExpenseController::class , 'update']);//testado via service
    Route::delete('/expense/{id}',[ExpenseController::class , 'destroy']);//testado via service
});






