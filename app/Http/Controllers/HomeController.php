<?php

namespace App\Http\Controllers;

use App\Models\GameCopy;

class HomeController extends Controller
{
    public function index()
    {
        $platformTotals = GameCopy::with('platform')
        ->get()
        ->groupBy(fn($copy) => $copy->platform->alias)
        ->map(fn($copies) => $copies->count());

        $totalCopies = GameCopy::count();

        // Get newest added copies with game info
        $newestCopies = GameCopy::with(['platform', 'game.genres'])
            ->latest('created_at')
            ->take(5)
            ->get();

        $mostExpensiveCopies = GameCopy::with(['platform', 'game.genres'])
            ->orderBy('purchase_price', 'desc')
            ->take(5)
            ->get();

        return view('home', compact('newestCopies', 'mostExpensiveCopies', 'platformTotals', 'totalCopies'));
    }
}