<x-layout>
    <div class="game-list-wrapper">
        <form method="GET" action="{{ route('games.index') }}" class="genre-filter">
            <div class="checkbox-group">
                @foreach($genres as $genre)
                    <input 
                        type="checkbox"
                        id="genre-{{ $genre->id }}"
                        name="genres[]"
                        value="{{ $genre->id }}"
                        {{ in_array($genre->id, request('genres', [])) ? 'checked' : '' }}
                        hidden
                    >

                    <label for="genre-{{ $genre->id }}" class="checkbox-button">
                        {{ $genre->name }}
                    </label>
                @endforeach
            </div>
        </form>
        
        <h2>Game Bases</h2>
        <div class="collection-overview mt-6 grid grid-cols-6 gap-x-5 gap-y-10">
            @foreach($gameBases as $gameBase)
                <div class="gameBase card">
                    <a href="{{ url('/games/'.$gameBase->id) }}">
                        <img width="400" src="{{ asset($gameBase->cover_image) }}">

                        @if($gameBase->game_copies_count === 0)
                            <span class="missing_copy card"><i class="fa-solid fa-circle-exclamation"></i></span>
                        @endif

                        <div>
                            <p class="platform">({{ $gameBase->release_year ?? 'N/A' }})
                            <p class="name">{{ $gameBase->title }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div> 
    </div>
</x-layout>