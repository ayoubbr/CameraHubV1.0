<nav x-data="{ open: false }" class="main-nav">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="nav-wrapper">
            <div class="nav-left">
                <!-- Logo -->
                <div class="logo-container">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="desktop-nav-links">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('subcategories')" :active="request()->routeIs('subcategories')">
                        {{ __('SubCategories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                        {{ __('Products') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="settings-dropdown">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="dropdown-trigger">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="dropdown-arrow">
                                <svg class="dropdown-arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')">
                            {{ __('My Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="hamburger-container">
                <button @click="open = ! open" class="hamburger-button">
                    <svg class="hamburger-icon" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="mobile-nav">
        <div class="mobile-nav-links">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="mobile-profile-section">
            <div class="mobile-user-info">
                <div class="mobile-username">{{ Auth::user()->name }}</div>
                <div class="mobile-useremail">{{ Auth::user()->email }}</div>
            </div>

            <div class="mobile-nav-actions">
                <x-responsive-nav-link :href="route('profile')">
                    {{ __('My Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
