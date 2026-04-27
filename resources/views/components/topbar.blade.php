<div class="topbar">
    <a href="/"><h4>Game Collection</h4></a>

    <div class="topbar-search-wrapper">        
        <input type="text" id="game-search" class="topbar-search" placeholder="Search games...">
        <ul id="search-results" class="card"></ul>

        @guest
        <div class="login-popup">
            <button class="icon-button">
                <i class="fa-solid fa-user"></i>
            </button>
        </div>

        <div class="login-form card create_list">
            <form method="POST" action="/login" enctype="multipart/form-data">
                @csrf
                <ul>
                    <li><input type="text" name="loginname" placeholder="Name"></li>
                    <li><input type="password" name="loginpass" placeholder="Password"></li>
                    <li><button type="submit" class="button">Login</button></li>
                </ul>
            </form>
        </div>
        @endguest

        @auth
        <div class="logout-form">
            <a href="/admin">
                <button class="icon-button">
                    <i class="fa-solid fa-user"></i>
                </button>
            </a>
        </div>
        @endauth

        <x-navbar></x-navbar>
        
    </div>
</div>