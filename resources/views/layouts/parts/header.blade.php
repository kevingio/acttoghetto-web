<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header position-inherit">
        <div class="wrap_header">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo-home">
                <img src="{{ asset('assets/images/icons/logo.png') }}" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <nav class="nav-menu">
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                </div>
            </nav>

            <!-- Header Icon -->
            <div class="header-icons">
                <span class="linedivide1"></span>

                <div class="header-wrapicon2 cart-header">
                    <img src="{{ asset('assets/images/icons/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>


                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem"></ul>

                        <div class="header-cart-total">
                            Total:
                            <span class="total-cart"></span>
                        </div>

                        <div class="header-cart-btn">

                            <div class="header-cart-wrap-btn">
                                <!-- Button -->
                                <a href="{{ url('/checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="wrap-side-menu mt-0" >
        <nav class="side-menu">
            <ul class="main-menu text-center">

                <li class="mb-2">
                    <h5 class="text-dark font-weight-bold mt-3">Look Book</h5>
                    @foreach($collections as $collection)
                    <a href="{{ url('/lookbook/' . $collection->volume) }}" class="rounded-style my-2">{{ $collection->volume }}</a>
                    @endforeach
                </li>
                <li @if(request()->is('home')) class="item-menu-mobile" @endif>
                    <a href="{{ route('home') }}" @if(!request()->is('home')) class="text-dark" @endif>HOME</a>
                </li>

                <li @if(request()->is('product') || request()->is('product/*')) class="item-menu-mobile" @endif>
                    <a href="{{ route('product.index') }}" @if(!request()->is('product') && !request()->is('product/*')) class="text-dark" @endif>PRODUCTS</a>
                </li>

                @if(auth()->check())
                <li @if(request()->is('profile')) class="item-menu-mobile" @endif>
                    <a href="{{ route('show-profile') }}"
                        @if(!request()->is('profile')) class="text-dark" @endif>
                        PROFILE
                    </a>
                </li>

                <li @if(request()->is('transaction')) class="item-menu-mobile" @endif>
                    <a href="{{ route('transaction.index') }}"
                        @if(!request()->is('transaction')) class="text-dark" @endif>
                        MY TRANSACTIONS
                    </a>
                </li>

                <li class="mb-1">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="text-dark">
                        LOGOUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                @else
                <li class="mb-1">
                    <a href="{{ route('login') }}" class="text-dark font-weight-bold">
                        LOGIN
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
