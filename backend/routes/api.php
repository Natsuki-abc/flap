<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeckController;
use App\Http\Controllers\Api\CardController;

Route::get('/', [DeckController::class, 'index']);

Route::prefix('user')->group(function () {

    Route::get('/card/{deckId}', [CardController::class, 'index']);

    // カード一枚だけ追加・編集する場合
    Route::post('/card/{deckId}', [CardController::class, 'store']);
    Route::put('/card/{cardId}', [CardController::class, 'update']);
});
