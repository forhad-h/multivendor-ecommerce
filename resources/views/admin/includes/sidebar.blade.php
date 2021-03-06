<style>
    .order_manage_menu_active, .menu_active {
        background: #87b2b3;
        color: white;
    }
</style>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img width="48" alt="image" class="rounded-circle"
                         src="{{ isset(Auth::user()->image) ? Auth::user()->image->url : asset('backend/img/profile/man.svg') }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">
                            @auth
                                {{ auth()->user()->name }}
                            @endauth
                        </span>
                        <span class="text-muted text-xs block">{{ ucfirst(auth()->user()->type) }}<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)"
                               onclick="document.getElementById('logout-form').submit()">Logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ getActiveClassByRoute('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Dashboards</span>
                </a>
            </li>

            @superadmin('super-admin')
            <li class="{{ getActiveClassByController('VendorController') }}">
                <a href="{{ route('admin.vendors.index') }}">
                    <i class="fa fa-list-ul"></i> <span class="nav-label">Vendors</span>
                </a>
            </li>

            <li class="{{ getActiveClassByController('CategoryController') }}">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-list-ul"></i> <span class="nav-label">Categories</span>
                </a>
            </li>

            <li class="{{ getActiveClassByController('SlidersController') }}">
                <a href="{{ route('admin.sliders.index') }}"><i class="fa fa-photo"></i>
                    <span class="nav-label">Sliders</span>
                </a>
            </li>

            @php($settings_active_class = getActiveClassByController('SiteSettingController') || getActiveClassByController('HomepageCategoryController') ||  getActiveClassByController('TaxController'))

            <li class="{{ $settings_active_class ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="nav-label">Settings</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ getActiveClassByController('SiteSettingController') }}">
                        <a href="{{ route('admin.setting.edit') }}"><i class="fa fa-globe"></i>
                            <span class="nav-label">Site setting</span>
                        </a>
                    </li>
                    <li class="{{ getActiveClassByController('HomepageCategoryController') }}">
                        <a href="{{ route('admin.setting.home-page-category.index') }}"><i class="fa fa-list-ul"></i>
                            <span class="nav-label">Homepage category</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endsuperadmin


            @vendor('vendor')
            <li class="{{ getActiveClassByController('BrandController') }}">
                <a href="{{ route('admin.brands.index') }}"><i class="fa fa-bars"></i>
                    <span class="nav-label">Brands</span>
                </a>
            </li>
            <li class="{{ getActiveClassByController('ProductController') }}">
                <a href="{{ route('admin.products.index') }}"><i class="fa fa-bars"></i>
                    <span class="nav-label">Products</span>
                </a>
            </li>
            <li class="{{ getActiveClassByController('CouponController') }}">
                <a href="{{ route('admin.coupons.index') }}"><i class="fa fa-gift"></i>
                    <span class="nav-label">Coupons</span>
                </a>
            </li>
            @endvendor
        </ul>
    </div>
</nav>
