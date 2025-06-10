<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Http\Requests\DeckRequest;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Deck::all();
        return response()->json($decks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeckRequest $request)
    {
        $deck = Deck::create($request->validated());
        return response()->json($deck, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        return response()->json($deck);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeckRequest $request, Deck $deck)
    {
        $deck->update($request->validated());
        return response()->json($deck);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        $deck->delete();
        return response()->json(null, 204);
    }
}
