<header>
    <div class="header-top d-flex justify-content-between align-items-center">
        <div class="container d-flex justify-content-end">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profile') }}">Профіль</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Вихід
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Логін</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регістрація</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
    <br>
    <div class="container header">
        <div class="nav d-flex justify-content-between align-items-center">
            <a class="" href="/">
                <img src="{{ asset('storage/logo.png') }}" height="100" width="230" alt="">
            </a>
            <form action="/articles" method="get" class="form-inline">
                <input class="form-control" name="search" type="search" placeholder="Пошук" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Пошук</button>
            </form>
            <a href="/cart">
                <i class="fas fa-shopping-cart">
                    <span class="badge badge-secondary badge-pill">
                        {{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}
                    </span>
                </i>
            </a>
        </div>
    </div>
</header>
