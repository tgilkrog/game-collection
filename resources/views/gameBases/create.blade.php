<x-layout>
    <h1>Add Game Base</h1>

    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
        @csrf

        <ul class="create_list create_gamebase">
            <li>
                <label>Title</label>
                <input type="text" name="title">
            </li>

            <li>
                <label>Release Year</label>
                <input type="number" name="release_year">
            </li>
            
            <li>
                <label>Publisher</label>
                <input type="text" name="publisher">
            </li>
            
            <li>
                <label>Developer</label>
                <input type="text" name="developer">
            </li>

            <li>
                <label>Description</label>
                <textarea name="description"></textarea>
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
                            hidden
                        >

                        <label for="genre-{{ $genre->id }}" class="checkbox-button">
                            {{ $genre->name }}
                        </label>
                    @endforeach
                </div>
            </li>
            
            <li>
                <button type="submit" class="button">Create Game</button>
            </li>
        </ul>

    </form>
</x-layout>