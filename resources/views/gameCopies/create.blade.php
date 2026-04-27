<x-layout>
    <h1>Add Game Copy</h1>

    <form method="POST" action="{{ route('copies.store') }}">
        @csrf

        <ul class="create_list create_gamebase">
            <li>
                <label>Title</label>
                <input type="text" name="title">
            </li>

            <li>
                <label>Base Game</label>
                <div class="search-select">
                    <input 
                        type="text" 
                        id="game-search1" 
                        placeholder="Search game..."
                        autocomplete="off"
                    >

                    <input type="hidden" name="game_base_id" id="game-id">

                    <div id="search-results1" class="search-results1"></div>
                </div>
            </li>

            <li>
                <label>Platform</label>
                <div class="checkbox-group">
                    @foreach($platforms as $platform)
                        <input 
                            type="radio" 
                            id="platform-{{ $platform->id }}" 
                            name="platform_id" 
                            value="{{ $platform->id }}"
                            hidden
                        >

                        <label for="platform-{{ $platform->id }}" class="checkbox-button">
                            {{ $platform->name }}
                        </label>
                    @endforeach
                </div>
            </li>

             <li>
                <label>Region</label>
                <input type="text" name="region">
            </li>
            
            <li>
                <label>Purchase Price</label>
                <input type="text" name="purchase_price">
            </li>
            
            <li>
                <label>Purchase Date</label>
                <input type="date" name="purchase_date">
            </li>

            <li>
                <label>Notes</label>
                <input type="text" name="notes">
            </li>

            <li>
                <label>Case Condition</label>
                <div class="checkbox-group">
                    @foreach($conditions->reverse() as $condition)
                        <input 
                            type="radio" 
                            id="case-{{ $condition->id }}" 
                            name="case_condition_id" 
                            value="{{ $condition->id }}"
                            hidden
                        >

                        <label for="case-{{ $condition->id }}" class="checkbox-button">
                            {{ $condition->name }}
                        </label>
                    @endforeach
                </div>
            </li>

            <li>
                <label>Disc Condition</label>
                <div class="checkbox-group">
                    @foreach($conditions->reverse() as $condition)
                        <input 
                            type="radio" 
                            id="disc-{{ $condition->id }}" 
                            name="disc_condition_id" 
                            value="{{ $condition->id }}"
                            hidden
                        >

                        <label for="disc-{{ $condition->id }}" class="checkbox-button">
                            {{ $condition->name }}
                        </label>
                    @endforeach
                </div>
            </li>

            <li>
                <label>Manual Condition</label>
                <div class="checkbox-group">
                    @foreach($conditions->reverse() as $condition)
                        <input 
                            type="radio" 
                            id="manual-{{ $condition->id }}" 
                            name="manual_condition_id" 
                            value="{{ $condition->id }}"
                            hidden
                        >

                        <label for="manual-{{ $condition->id }}" class="checkbox-button">
                            {{ $condition->name }}
                        </label>
                    @endforeach
                </div>
            </li>

            <li>
                <button type="submit" class="button">Create Copy</button>
            </li>
            
        </ul>

    </form>
</x-layout>