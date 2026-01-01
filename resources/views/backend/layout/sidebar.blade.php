<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{ route('home') }}" class="brand-wrap">
            <img src="{{ asset('storage/' . $settings->header_logo) }}" class="logo" alt="Nest Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i
                    class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.dashboard') }}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.carousel.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.carousel.index') }}">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Carousels</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.category.index') }}">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Categories</span>
                </a>
            </li>
            <li
                class="menu-item has-submenu {{ request()->routeIs('admin.blog.index') | request()->routeIs('admin.blog.create') ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Blogs</span>
                </a>
                <div class="submenu">
                    <a class="{{ request()->routeIs('admin.blog.index') ? 'active' : '' }}"
                        href="{{ route('admin.blog.index') }}">Blogs list</a>
                    <a class="{{ request()->routeIs('admin.blog.create') ? 'active' : '' }}"
                        href="{{ route('admin.blog.create') }}">Add Post</a>
                </div>
            </li>
            <li
                class="menu-item has-submenu {{ request()->routeIs('admin.service.index') | request()->routeIs('admin.service.create') ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Services</span>
                </a>
                <div class="submenu">
                    <a class="{{ request()->routeIs('admin.service.index') ? 'active' : '' }}"
                        href="{{ route('admin.service.index') }}">Services list</a>
                    <a class="{{ request()->routeIs('admin.service.create') ? 'active' : '' }}"
                        href="{{ route('admin.service.create') }}">Add service</a>
                </div>
            </li>
            <li
                class="menu-item has-submenu {{ request()->routeIs('admin.car.index') | request()->routeIs('admin.car.create') ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">cars</span>
                </a>
                <div class="submenu">
                    <a class="{{ request()->routeIs('admin.car.index') ? 'active' : '' }}"
                        href="{{ route('admin.car.index') }}">cars list</a>
                    <a class="{{ request()->routeIs('admin.car.create') ? 'active' : '' }}"
                        href="{{ route('admin.car.create') }}">Add car</a>
                </div>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.testimonial.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.testimonial.index') }}">
                    <i class="icon material-icons md-comment"></i>
                    <span class="text">Testimonials</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.brand.index') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.brand.index') }}"> <i
                        class="icon material-icons md-stars"></i> <span class="text">Brands</span> </a>
            </li>
        </ul>
        <hr />
        <ul class="menu-aside">
            <li class="menu-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <a class="menu-link" href="{{ route('admin.settings') }}">
                    <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
