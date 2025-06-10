<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Http\Requests\CardRequest as Request;

class CardController extends Controller
{
    /**
     * 指定したデッキのカード一覧を取得
     *
     * @param Request $request
     * @param int $deckId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, int $deckId)
    {
        $cards = Card::where('deck_id', $deckId)->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'cards' => $cards,
            ],
        ]);
    }

    /**
     * 指定したデッキにカードを追加
     *
     * @param Request $request
     * @param int $deckId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, int $deckId)
    {
        // TODO
        $card = Card::create();

        return response()->json($card, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        return response()->json($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $card->update($request->validated());
        return response()->json($card);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return response()->json(null, 204);
    }
}
