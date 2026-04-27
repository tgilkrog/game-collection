<x-layout>
    <div class="game-content-wrapper">
        <div class="game-content-top">
            <h1 class="game-base-title">{{ $copy->game->title }}</h1>
        </div>

        <div class="game-base-content">
            <img width="600" src="{{ $copy->game->cover_image }}">
            <div class="game-base-info">
                <div class="game-base-details">
                    <h4>Game Details</h4>
                    <p>Platform - {{ $copy->game->platform->name }}</p>
                    <p>Release year - {{ $copy->game->release_year }}</p>
                    <p>Publisher {{ $copy->game->publisher }}</p>
                    <p>Developer {{ $copy->game->developer }}</p>
                    <p>Genres {{ $copy->game->genres->pluck('name')->join(', ') }}</p>
                </div>
                <div class="game-base-desc">
                    <h4>Description</h4>
                    <p>{{ $copy->game->description }}</p>
                </div>
                
            </div>
        </div>

        <div class="game-copy-content">
            <h4>My Copy</h4>
        </div>
    </div>
</x-layout>