<?php

use Application\Presentation\Controller\Author\AuthorController;
use Application\Presentation\Controller\Book\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->group(function () {
    Route::post('/', [AuthorController::class, 'create']);
    Route::patch('/', [AuthorController::class, 'update']);
    Route::get('/', [AuthorController::class, 'getList']);
    Route::get('/{id}', [AuthorController::class, 'find']);
});

Route::prefix('book')->group(function () {
    Route::post('/', [BookController::class, 'create']);
    Route::patch('/', [BookController::class, 'create']);
    Route::get('/', [BookController::class, 'getList']);
    Route::get('/{id}', [BookController::class, 'find']);
});

