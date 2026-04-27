<div class="navbar-container">

    <!-- Toggle button -->
    <button id="menu-toggle" class="menu-toggle icon-button" aria-label="Open menu">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Fullscreen Menu -->
    <div id="navbar-menu" class="navbar-overlay">

        <!-- Close button -->
        <button id="menu-close" class="menu-close" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="navbar">

            <div class="navbar-item">
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </div>    

            <div class="navbar-item">
                <a href="/platforms" class="{{ request()->is('platforms*') ? 'active' : '' }}">
                    <i class="fa-brands fa-playstation"></i>
                    <span>Platforms</span>
                </a>
            </div>

            <div class="navbar-item">
                <a href="/copies" class="{{ request()->is('copies*') ? 'active' : '' }}">
                    <i class="fa-solid fa-compact-disc"></i>
                    <span>Game Copy</span>
                </a>
                @auth
                <a style="margin-left: 25px;" href="{{ url('/copies/create') }}">+</a>
                @endauth
            </div>

            <div class="navbar-item">
                <a href="/games" class="{{ request()->is('games*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gamepad"></i>
                    <span>Game Base</span>
                </a>
                @auth
                <a style="margin-left: 25px;" href="{{ url('/games/create') }}">+</a>
                @endauth
            </div>

            @auth
            <div class="navbar-item">
                <a href="/genres" class="{{ request()->is('genres*') ? 'active' : '' }}">
                    <i class="fa-solid fa-masks-theater"></i>
                    <span>Genres</span>
                </a>
            </div>
            @endauth

        </div>
    </div>
</div>