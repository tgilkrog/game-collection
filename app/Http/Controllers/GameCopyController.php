<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\GameBase;
use App\Models\GameCopy;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;

class GameCopyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = GameCopy::with(['game.genres']);
        if ($request->filled('genres')) {
            $query->whereHas('game.genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->genres);
            });
        }

        $gameCopies = $query->latest()->get();
        $genres = Genre::orderBy('name')->get();

        /*$gameCopies = GameCopy::orderBy('title')->get();*/

        return view('gameCopies.index', compact('gameCopies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gameBases = GameBase::orderBy('title')->get();
        $platforms = Platform::orderBy('name')->get();
        $conditions = Condition::orderBy('id')->get();

        return view('gameCopies.create', compact('gameBases', 'platforms', 'conditions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'game_base_id' => 'required|exists:game_bases,id',
            'platform_id' => 'required|exists:platforms,id',
            'region' => 'nullable|string',
            'purchase_price' => 'nullable|decimal:0,2',
            'purchase_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'case_condition_id' => 'required|exists:conditions,id',
            'disc_condition_id' => 'required|exists:conditions,id',
            'manual_condition_id' => 'required|exists:conditions,id'
        ]);

        GameCopy::create($validated);

        return redirect()->route('games.show', $validated['game_base_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(GameCopy $copy)
    {
        return view('gameCopies.show', compact('copy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameCopy $copy)
    {
        $platforms = Platform::orderBy('name')->get();
        $conditions = Condition::orderBy('id')->get();

        return view('gameCopies.edit', compact('copy', 'platforms', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameCopy $copy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'game_base_id' => 'required|exists:game_bases,id',
            'platform_id' => 'required|exists:platforms,id',
            'region' => 'nullable|string',
            'purchase_price' => 'nullable|decimal:0,2',
            'purchase_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'case_condition_id' => 'required|exists:conditions,id',
            'disc_condition_id' => 'required|exists:conditions,id',
            'manual_condition_id' => 'required|exists:conditions,id'
        ]);

        $copy->update($validated);

        return redirect()->route('games.show', $copy->game->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameCopy $copy)
    {
        $copy->delete();

        return redirect()->route('home')->with('success', 'Game deleted successfully.');
    }
}
