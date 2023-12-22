<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReportApiController;
use App\Http\Controllers\Api\ApiBookIssueController;
use App\Http\Controllers\Api\ApiAuthorController;
use App\Http\Controllers\Api\ApiBookController;
use App\Http\Controllers\Api\ApiCategoryController;

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

    Route::get('/reports/date-wise', [ReportApiController::class, 'apiDateWise']);
    Route::get('/reports/month-wise', [ReportApiController::class, 'apiMonthWise']);
    Route::get('/reports/not-returned', [ReportApiController::class, 'apiNotReturned']);

    Route::get('/issue/book-issues', [ApiBookIssueController::class, 'apiindex']);
    Route::get('/issue/book-issues/create', [ApiBookIssueController::class, 'apicreate']);
    Route::post('/issue/book-issues', [ApiBookIssueController::class, 'apistore']);
    Route::get('/issue/book-issues/{id}/edit', [ApiBookIssueController::class, 'apiedit']);
    Route::put('/issue/book-issues/{id}', [ApiBookIssueController::class, 'apiupdate']);
    Route::delete('/issue/book-issues/{id}', [ApiBookIssueController::class, 'apidestroy']);

    Route::get('/authors', [ApiAuthorController::class, 'authorindex']);
    Route::post('/authors', [ApiAuthorController::class, 'authorstore']);
    Route::get('/authors/{id}', [ApiAuthorController::class, 'authorshow']);
    Route::put('/authors/{id}', [ApiAuthorController::class, 'authorupdate']);
    Route::delete('/authors/{id}', [ApiAuthorController::class, 'authordestroy']);

    Route::get('/books', [ApiBookController::class, 'bookindex']);
    Route::get('/books/{id}', [ApiBookController::class, 'bookshow']);
    Route::post('/books', [ApiBookController::class, 'bookstore']);
    Route::put('/books/{id}', [ApiBookController::class, 'bookupdate']);
    Route::delete('/books/{id}', [ApiBookController::class, 'bookdestroy']);

    Route::get('/categories', [ApiCategoryController::class, 'categoryindex']);
    Route::post('/categories', [ApiCategoryController::class, 'categorystore']);
    Route::put('/categories/{id}', [ApiCategoryController::class, 'categoryupdate']);
    Route::delete('/categories/{id}', [ApiCategoryController::class, 'categorydestroy']);
    