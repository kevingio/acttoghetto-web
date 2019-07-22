<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ url('/admin/transaction') }}" class="logo">
            <span>
                <img src="{{ URL::asset('assets/images/admin/logo-light.png')}}" alt="" height="18">
            </span>
            <i>
                <img src="{{ URL::asset('assets/images/admin/logo-sm.png')}}" alt="" height="22">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="navbar-right d-flex list-inline float-right mb-0">

            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="mr-3">{{ auth()->user()->name }}</span>
                        <img src="{{ URL::asset('assets/images/admin/user-1.jpg')}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item btn-profile-admin" href="#" data-name="{{ auth()->user()->name }}" data-email="{{ auth()->user()->email }}"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item btn-password-admin" href="#"><i class="mdi mdi-lock m-r-5"></i> Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 <i class="mdi mdi-power text-danger"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>

    </nav>
</div>
<!-- Top Bar End -->
