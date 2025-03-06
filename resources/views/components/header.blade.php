<header class="site-header">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <h1><i class="fas fa-camera-retro"></i> CameraHub</h1>
                </a>
            </div>

            <nav class="main-nav">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Brands</a></li>
                    <li><a href="#">Lenses</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <div class="search-form">
                    <form action="#" method="GET">
                        <input type="text" placeholder="Search products..." name="search">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <div class="user-actions">
                    @if (Route::has('login'))
                        @auth
                            @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('dashboard') }}" class="account-link"><i class="fas fa-user"></i></a>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" class="account-link"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i></button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="account-link"><i class="fas fa-sign-in-alt"></i></a>
                            <a href="{{ route('register') }}" class="account-link"><i
                                    class="fa-solid fa-user-plus"></i></a>
                        @endauth
                    @endif

                    <a href="{{ route('cart') }}" class="cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">{{ $cart_count }}</span>
                    </a>
                </div>

                <button class="mobile-menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>