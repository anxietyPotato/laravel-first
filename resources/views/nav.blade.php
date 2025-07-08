<style>
    .navbar-nav .nav-link:hover {
        color: #b794f4 !important; /* Soft purple on hover */
    }

    .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #d6bbfb !important; /* Purple highlight for active page */
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand fw-bold text-light me-5" href="/">MyStore</a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>

             
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" href="/shop">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/Add-Grades') ? 'active' : '' }}" href="/admin/Add-Grades">Add Grades</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/add-product') ? 'active' : '' }}" href="/admin/add-product">Add Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/all-products') ? 'active' : '' }}" href="/admin/all-products">All Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('AllContact') ? 'active' : '' }}" href="/AllContact">All Contacts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

