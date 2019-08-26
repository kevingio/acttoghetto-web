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
                        <i class="mdi mdi-tshirt-crew"></i>
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
                                <span> Man </span>
                            </a>
                        </li>
                        <li @if(!empty(request()->type) && request()->type == 'woman') class="active" @endif>
                            <a href="/admin/product?type=woman" class="waves-effect">
                                <span> Woman </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="/admin/banner" class="waves-effect">
                        <i class="mdi mdi-image-multiple"></i>
                        <span> Banner Promo </span></a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-database"></i>
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
                                <span> Category </span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/brand" class="waves-effect">
                                <span> Brand </span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/size" class="waves-effect">
                                <span> Size </span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/collection" class="waves-effect">
                                <span> Collection </span>
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
