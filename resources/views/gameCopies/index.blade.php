<x-layout>
    <form method="GET" action="{{ route('copies.index') }}" class="genre-filter">
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

    <x-gameList :items="$gameCopies" title="My Copies"></x-game-list>
</x-layout>