<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\QuoteController;

Route::post('/v1/login', [AuthController::class, 'login']);
// Route::middleware('apikey.auth')->group(function () {
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/logout', [AuthController::class, 'logout']);

    // Invoice routes
    Route::get('/v1/invoices', [InvoiceController::class, 'index']);
    Route::get('/v1/invoices/{invoice}', [InvoiceController::class, 'show']);
    Route::get('/v1/searchinvoices', [InvoiceController::class, 'search'])->name('invoices.search');
    Route::post('/v1/invoices', [InvoiceController::class, 'store']);
    Route::put('/v1/invoices/{id}', [InvoiceController::class, 'update']);
    Route::delete('/v1/invoices/{id}', [InvoiceController::class, 'destroy']);
    Route::post('/v1/invoices/{id}/duplicate', [InvoiceController::class, 'duplicate']);
    Route::put('/v1/invoices/{id}/status', [InvoiceController::class, 'updateStatus']);
    Route::put('/v1/invoices/{id}/refund', [InvoiceController::class, 'refund']);
    Route::post('/v1/invoices/draft', [InvoiceController::class, 'saveAsDraft']);
    Route::post('/v1/invoices/{id}/schedule', [InvoiceController::class, 'schedule']);
    Route::post('/v1/invoices/{id}/send-email', [InvoiceController::class, 'sendEmail']);
    Route::get('/v1/invoices/{id}/pdf', [InvoiceController::class, 'generatePdf']);

    // Customer routes
    Route::get('/v1/searchcustomers', [CustomerController::class, 'search']);
    Route::get('/v1/customers/{customer}', [CustomerController::class, 'show']);
    Route::post('/v1/customers', [CustomerController::class, 'store']);
    Route::put('/v1/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/v1/customers/{id}', [CustomerController::class, 'destroy']);

    // Product routes
    Route::get('/v1/searchproducts', [ProductController::class, 'search']);
    Route::get('/v1/products/{product}', [ProductController::class, 'show']);
    Route::post('/v1/products', [ProductController::class, 'store']);
    Route::put('/v1/products/{id}', [ProductController::class, 'update']);
    Route::delete('/v1/products/{id}', [ProductController::class, 'destroy']);

    // Quote routes
    Route::apiResource('/v1/quotes', QuoteController::class);
    Route::put('/v1/quotes/{id}/status', [QuoteController::class, 'changeStatus']);
    // In routes/api.php
    Route::get('/v1/searchquotes', [QuoteController::class, 'search']);
    // In routes/api.php
    Route::get('/v1/quotes/{id}/pdf', [QuoteController::class, 'generatePdf']);
    // In routes/api.php
Route::post('/v1/quotes/{id}/send-email', [QuoteController::class, 'sendEmail']);
});