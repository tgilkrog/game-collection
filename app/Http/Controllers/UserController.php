<?php

namespace App\Http\Controllers;

use App\Models\GameBase;
use App\Models\GameCopy;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['login', 'logout']);
    }

    public function index () {
        $totalGames = GameBase::count();
        $totalCopies = GameCopy::count();
        $totalValue = GameCopy::sum('purchase_price');
        $gamesWithoutCopies = GameBase::doesntHave('game_copies')->get();
        $gamesWithoutCover = GameBase::whereNull('cover_image')->get();

        return view('user.index', compact('totalGames', 'totalCopies', 'gamesWithoutCopies', 'gamesWithoutCover', 'totalValue'));
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'loginname' => 'required',
            'loginpass' => 'required'
        ]);

        if (auth()->attempt(['name' => $validated['loginname'], 'password' => $validated['loginpass']])) {
            $request->session()->regenerate();
        }
        
        return redirect('/admin');
    }

    public function logout () {
        auth()->logout();
        
        return redirect('/');
    }
}