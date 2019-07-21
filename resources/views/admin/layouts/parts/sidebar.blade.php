<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ url('/admin/transaction') }}" class="waves-effect">
                        <i class="mdi mdi-receipt"></i>
                        <span> Rekap Transaksi </span>
                    </a>
                </li>

                <li @if(request()->is('admin/product') || request()->is('admin/product/*')) class="active" @endif>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-google-pages"></i>
                        <span>
                            Product
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li @if(!empty(request()->type) && request()->type == 'man') class="active" @endif>
                            <a href="/admin/product?type=man" class="waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span> Man </span>
                            </a>
                        </li>
                        <li @if(!empty(request()->type) && request()->type == 'woman') class="active" @endif>
                            <a href="/admin/product?type=woman" class="waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span> Woman </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="/admin/banner-promo" class="waves-effect">
                        <i class="mdi mdi-receipt"></i>
                        <span> Banner Promo </span></a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-google-pages"></i>
                        <span>
                            Master Data
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/admin/category" class="waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span> Category </span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/brands" class="waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span> Brand </span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/size" class="waves-effect">
                                <i class="mdi mdi-calendar-check"></i>
                                <span> Size </span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
