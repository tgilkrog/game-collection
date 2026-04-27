<x-layout>
    <h1>Edit Game Copy</h1>

    <form method="POST" action="{{ route('copies.update', $copy->id) }}">
        @csrf
        @method('PUT')

        <ul class="create_list create_gamebase">
            <li>
                <label>Title</label>
                <input type="text" name="title" value="{{ $copy->title }}">
            </li>

            <li>
                <label>Base Game</label>
                <div class="search-select">
                    <input 
                        type="text" 
                        id="game-search1" 
                        placeholder="Search game..."
                        autocomplete="off"
                        value="{{ $copy->game->title }}"
                    >

                    <input type="hidden" name="game_base_id" id="game-id" value="{{ $copy->game_base_id }}">

                    <div id="search-results1" class="search-results1"></div>
                </div>
            </li>

            <li>
                <label>Platform</label>
                <select name="platform_id">
                    @foreach($platforms as $platform)
                        <option value="{{ $platform->id }}"  {{ $copy->platform_id === $platform->id ? 'selected' : '' }}>{{ $platform->name }}</option>
                    @endforeach
                </select>
            </li>

            <li>
                <label>Region</label>
                <input type="text" name="region" value="{{ $copy->region }}">
            </li>
            
            <li>
                <label>Purchase Price</label>
                <input type="text" name="purchase_price" value="{{ $copy->purchase_price }}">
            </li>
            
            <li>
                <label>Purchase Date</label>
                <input type="date" name="purchase_date" value="{{ $copy->purchase_date->format('Y-m-d') }}">
            </li>

            <li>
                <label>Notes</label>
                <input type="text" name="notes" value="{{ $copy->notes }}">
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
                            {{ $copy->case_condition_id === $condition->id ? 'checked' : '' }}
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
                            {{ $copy->disc_condition_id === $condition->id ? 'checked' : '' }}
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
                            {{ $copy->manual_condition_id === $condition->id ? 'checked' : '' }}
                            hidden
                        >

                        <label for="manual-{{ $condition->id }}" class="checkbox-button">
                            {{ $condition->name }}
                        </label>
                    @endforeach
                </div>
            </li>

            <li>
                <button type="submit" class="button">Update Copy</button>
            </li>
            
        </ul>

    </form>
</x-layout>