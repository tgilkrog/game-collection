<x-layout>
    <div class="game-content-wrapper">
        <div class="game-base-content">
            <img width="600" src="{{ asset($game->cover_image) }}">
            <div class="game-base-info">
                <div class="game-base-top">
                    <h1 class="game-base-title">{{ $game->title }}</h1>
                    <div class="buttons">
                        @auth
                        <a href="{{ route('games.edit', $game->id) }}" class="card"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Delete this game?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="card"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </form>
                        @endauth
                    </div>
                </div>
                <div class="game-base-details card">
                    <h4>Game Details</h4>
                    <div class="details-content">
                        <p><i class="fa-solid fa-calendar"></i> Release year</p> <p class="value">{{ $game->release_year }}</p>
                        <p><i class="fa-solid fa-building-user"></i> Publisher</p> <p class="value">{{ $game->publisher }}</p>
                        <p><i class="fa-solid fa-laptop"></i> Developer</p> <p class="value">{{ $game->developer }}</p>
                        <p><i class="fa-solid fa-book"></i> Genres</p> 
                        <p>
                            @foreach ($game->genres as $genre)
                                <span>{{ $genre->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div class="game-base-description">
                        <p>{{ $game->description }}</p>
                    </div>
                </div>
                <div class="game-base-desc card" style="display:none;">
                    <h4>Description</h4>
                    <p>{{ $game->description }}</p>
                </div>
                
            </div>
        </div>

        <div class="game-copy-content">
            @if ($game->game_copies->isEmpty())
            <p class="no-copies">No copies found</p>
                <a class="create-copy button" href="/copies/create?id={{ $game->id }}&name={{ $game->title }}">
                    Add a copy
                </a>
            @endif
            @foreach ($game->game_copies as $copy)             
                <div class="game-copy-single card">
                    <div class="copies_buttons">
                        @auth
                        <a href="{{ route('copies.edit', $copy->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('copies.destroy', $copy->id) }}" method="POST" onsubmit="return confirm('Delete this game?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </form>
                        @endauth
                    </div>  
                    <div class="copy-content-wrapper">
                        <div class="left-content">
                            <p class="copy-title">{{ $copy->title }}</p>
                            <p>Platform: <span>{{ $copy->platform->name }}</span></p>
                            <p>Region: <span>{{ $copy->region }}</span></p>
                            <p>Purchase Price: <span>{{ number_format($copy->purchase_price, 2, ',', '.') }} kr.</span></p>
                            <p>Purchase Date: <span>{{ $copy->purchase_date->format('Y-m-d') }}</span></p>
                            <p>Notes: <span>{{ $copy->notes }}</span></p>
                        </div>
                        <div class="right-content">
                            <div class="conditions-row">
                                <p class="">Case Condition</p> 
                                    <div class="condition-items">
                                        @foreach($conditions->reverse() as $condition)
                                            <span class="conditions {{ $copy->caseCondition && $copy->caseCondition->id === $condition->id ? 'highlight' : '' }}">
                                                {{ $condition->name }}
                                            </span>
                                        @endforeach
                                    </div>
                            </div>
                            <div class="conditions-row">
                                <p>Disc Conditon</p> 
                                <div class="condition-items">
                                    @foreach($conditions->reverse() as $condition)
                                        <span class="conditions {{ $copy->discCondition && $copy->discCondition->id === $condition->id ? 'highlight' : '' }}">
                                            {{ $condition->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="conditions-row">
                                <p>Manual Condition</p>
                                <div class="condition-items">
                                    @foreach($conditions->reverse() as $condition)
                                        <span class="conditions {{ $copy->manualCondition && $copy->manualCondition->id === $condition->id ? 'highlight' : '' }}">
                                            {{ $condition->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            @endforeach
        </div>
    </div>
</x-layout>