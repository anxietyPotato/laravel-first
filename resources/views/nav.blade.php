<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="{{ url('/') }}">MyStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
                </li>

                <!-- Admin Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin/*') ? 'active' : '' }}" href="#"
                       id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item {{ request()->is('admin/Add-Grades') ? 'active' : '' }}" href="{{ url('/admin/Add-Grades') }}">Add Grades</a></li>
                        <li><a class="dropdown-item {{ request()->is('admin/add-product') ? 'active' : '' }}" href="{{ url('/admin/add-product') }}">Add Product</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('all.products') ? 'active' : '' }}" href="{{ route('all.products') }}">All Products</a></li>
                        <li><hr class="dropdown-divider bg-light"></li>
                        <li><a class="dropdown-item {{ request()->routeIs('all.contact') ? 'active' : '' }}" href="{{ route('all.contact') }}">All Contacts</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
