<x-layout>
    <div class="genre-wrapper">
        <div class="create-wrapper card create_list">
            <form method="POST" action="{{ route('genres.store') }}" enctype="multipart/form-data">
                @csrf
                    <ul>
                        <li>
                            <label>Name</label>
                            <input type="text" name="name">
                        </li>
                        <li>
                            <label>Slug</label>
                            <input type="text" name="slug">
                        </li>
                        <li class="list-button">
                            <button type="submit" class="button">Create</button>
                        </li>
                    </ul>
            </form>
        </div>
        <div class="genre-list">
            <ul>
                @foreach ($genres as $item)
                    <li class="card">
                        <p>{{ $item->name }}</p>
                        <form action="{{ route('genres.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this genre?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>