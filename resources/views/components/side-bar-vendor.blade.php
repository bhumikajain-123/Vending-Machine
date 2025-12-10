<div class="col-lg p-0">
    <div class="sidebar">

        <h4 class=" text-white text-center py-3 border-bottom">MENU</h4>


        <ul>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Dashboard</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white"  data-bs-toggle="dropdown">
                    Product
                </a>

                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/vendor/add_product') }}">Add Product</a></li>


                    <li><a class="dropdown-item" href="{{ url('/vendor/view_product') }}">View Category</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Users</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/vendor/profile') }}">Profile</a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link text-danger" href="{{ url('vendor/logout') }}">Logout</a>
            </li> -->

        </ul>
    </div>
</div>