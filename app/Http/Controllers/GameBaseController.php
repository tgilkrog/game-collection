<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\GameBase;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GameBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = GameBase::withCount('game_copies');

        if ($request->filled('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->genres);
            });
        }

        $gameBases = $query->orderBy('title')->get();
        $genres = Genre::orderBy('name')->get();

        return view('gameBases.index', compact('gameBases', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();

        return view('gameBases.create', compact('genres', 'platforms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('game_bases', 'title')],
            'release_year' => 'nullable|integer',
            'publisher' => 'nullable|string',
            'developer' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image',
            'genres' => 'nullable|array'
        ]);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image'); 

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->scale(width: 600);
            
            $filename = $file->getClientOriginalName();
            $path = "images/covers/";
  
            $image->save($path . '/' . $filename, quality: 100);
            $validated['cover_image'] = "{$path}/" . $filename;
        }

        $game = GameBase::create($validated);

        if ($request->genres) {
            $game->genres()->sync($request->genres);
        }

        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GameBase $game)
    {
       $game->load(['genres', 'game_copies']);

       // Get all possible conditions
        $conditions = Condition::all();
        
        return view('gameBases.show', compact('game', 'conditions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameBase $game)
    {
        $genres = Genre::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();

        return view('gameBases.edit', compact('game', 'genres', 'platforms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameBase $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'nullable|integer',
            'publisher' => 'nullable|string',
            'developer' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image',
            'genres' => 'nullable|array'
        ]);

        if ($request->hasFile('cover_image')) {
            // delete old image
            if ($game->cover_image && file_exists(public_path($game->cover_image))) {
                unlink(public_path($game->cover_image));
            }

            $file = $request->file('cover_image');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->scale(width: 600);

            $filename = $file->getClientOriginalName();
            $path = "images/covers/";

            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $image->save(public_path($path.'/'.$filename), 100);

            $validated['cover_image'] = "{$path}/{$filename}";
        }

        $game->update($validated);

        if ($request->genres) {
            $game->genres()->sync($request->genres);
        }

        return redirect()->route('games.show', $game->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameBase $game)
    {
        $game->delete();

        return redirect()->route('/');
    }

    public function search(Request $request)
    {
        $query = $request->get('query', '');

        $games = GameBase::with('game_copies.platform')
            ->where('title', 'like', "%{$query}%")
            ->limit(10)
            ->get()
            ->map(function ($game) {
                $game->cover_image = asset($game->cover_image);
                return $game;
            });

        return response()->json($games);
    }
}
