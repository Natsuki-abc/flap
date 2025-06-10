<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();
        return response()->json($cards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardRequest $request)
    {
        $card = Card::create($request->validated());
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
    public function update(CardRequest $request, Card $card)
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
