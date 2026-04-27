<?php

namespace App\Http\Controllers;

use App\Models\GameCopy;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platformTotals = GameCopy::with('platform')
        ->get()
        ->groupBy(fn($copy) => $copy->platform->alias)
        ->map(fn($copies) => $copies->count());
        
        // Get all platforms, optionally ordered by name
        $platforms = Platform::orderBy('name')->get();

        return view('platforms.index', compact('platforms', 'platformTotals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        $copies = GameCopy::with('game')
        ->where('platform_id', $platform->id)
        ->orderBy('title')
        ->get();

        return view('platforms.show', compact('platform', 'copies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Platform $platform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platform $platform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        //
    }
}
