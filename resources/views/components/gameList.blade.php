<div class="game-list-wrapper">
    <h2>{{ isset($title) ? $title : '' }}</h2>
    <div class="collection-overview mt-2 grid grid-cols-5 gap-x-5 gap-y-10" style="width: 50%;">
        @foreach($items as $item)
            <div class="gameBase card">
                <a href="{{ url('/games/'.$item->game->id) }}">
                    <img width="400" src="{{ asset($item->game->cover_image) }}">

                    <div>
                        <p class="platform">({{ $item->game->release_year ?? 'N/A' }}) -
                        {{ $item->platform->name }}</p>
                        <p class="name">{{ $item->game->title }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div> 
</div>