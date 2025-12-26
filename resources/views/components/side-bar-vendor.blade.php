<div class="row g-0">
    <!-- Sidebar Column -->
    <div class="col-lg-2 p-0">
        <div class="sidebar">
            <!-- Sidebar Header -->
            <h4 class="text-white text-center py-3 border-bottom">MENU</h4>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li><a class="nav-link" href="{{ url('/vendor/dashboard') }}">Dashboard</a></li>
                <li><a class="nav-link" href="{{ url('/vendor/add_product') }}">Add Product</a></li>
                <li><a class="nav-link" href="{{ url('/vendor/view_product') }}">View Product</a></li>
                          <a class="nav-link text-danger" href="{{ url('vendor/logout') }}">Logout</a>
            </ul>
        </div>
    </div>

    <!-- Main Content Column -->
    <div class="col-lg-10 main-content">
        <!-- Your main content goes here (products, cards, etc.) -->
        @yield('content')
    </div>
</div>
