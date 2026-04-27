<x-layout>
    <div class="logout-form">
        <form method="POST" action="/logout" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="icon-button">
                <i class="fa-solid fa-power-off"></i> LOGOUT
            </button>
        </form>
    </div>
    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- Stats Cards -->
            <div class="grid grid-cols-3 gap-6 mb-10">
                <div class="p-5 rounded shadow">
                    <p class="text-gray-500">Total Games</p>
                    <p class="text-2xl font-bold">{{ $totalGames }}</p>
                </div>

                <div class="p-5 rounded shadow">
                    <p class="text-gray-500">Total Copies</p>
                    <p class="text-2xl font-bold">{{ $totalCopies }}</p>
                </div>

                <div class="p-5 rounded shadow">
                    <p class="text-gray-500">Collection Value</p>
                    <p class="text-2xl font-bold">{{ number_format($totalValue, 2, ',', '.') }} kr.</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-2 gap-6 mb-10">
                <a href="/games/create" class="bg-blue-500 text-white p-5 rounded shadow hover:bg-blue-600">
                    ➕ Add Game
                </a>

                <a href="/copies/create" class="bg-green-500 text-white p-5 rounded shadow hover:bg-green-600">
                    ➕ Add Copy
                </a>
            </div>

            <!-- Data Issues / Maintenance -->
            <div class="p-5 rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Maintenance</h2>
                <a href="#" class="text-red-500">
                    Games without Copy
                </a>
                <div class="grid grid-cols-6 gap-6 mb-10">
                    @foreach($gamesWithoutCopies as $gameBase)
                        <div class="gameBase">
                            <a href="{{ url('/games/'.$gameBase->id) }}">
                                <img style="width: 200px !important; height: 250px !important;" src="{{ asset($gameBase->cover_image) }}">
                            </a>
                            <a href="/copies/create?id={{ $gameBase->id }}&name={{ $gameBase->title }}">
                                create
                            </a>
                        </div>
                    @endforeach
                </div>            
                <a href="#" class="text-red-500">
                    Missing cover images
                </a>
                <div class="grid grid-cols-6 gap-6 mb-10">
                    @foreach($gamesWithoutCover as $gameBase)
                        <div class="gameBase">
                            <a href="{{ url('/games/'.$gameBase->id) }}">
                                <img style="width: 200px !important; height: 250px !important;" src="{{ asset($gameBase->cover_image) }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</x-layout>