<x-layout>
<h1>Edit Game</h1>

<form method="POST" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <ul class="create_list">

        <li>
            <label>Title</label>
            <input type="text" name="title" value="{{ $game->title }}">
        </li>

        <li>
            <label>Release Year</label>
            <input type="number" name="release_year" value="{{ $game->release_year }}">
        </li>

        <li>
            <label>Publisher</label>
            <input type="text" name="publisher" value="{{ $game->publisher }}">
        </li>

        <li>
            <label>Developer</label>
            <input type="text" name="developer" value="{{ $game->developer }}">
        </li>

        <li>
            <label>Description</label>
            <textarea name="description">{{ $game->description }}</textarea>
        </li>

        <li>
            <label>Cover Image</label>
            <input type="file" name="cover_image">
        </li>

         <li>
            <label>Genres</label>
            <div class="checkbox-group">
                @foreach($genres as $genre)
                    <input 
                        type="checkbox" 
                        id="genre-{{ $genre->id }}" 
                        name="genres[]" 
                        value="{{ $genre->id }}"
                        {{ $game->genres->contains($genre->id) ? 'checked' : '' }}
                        hidden
                    >

                    <label for="genre-{{ $genre->id }}" class="checkbox-button">
                        {{ $genre->name }}
                    </label>
                @endforeach
            </div>
        </li>

        <li>
            <button type="submit" class="button">Update Game</button>
        </li>

    </ul>

</form>
</x-layout>