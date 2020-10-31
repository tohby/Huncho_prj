<div class="sidebar" data-image="{{ asset('images/sidebar-1.jpg') }}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/admin" class="simple-text">
                CARtel
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-chart-pie"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./user.html">
                    <i class="fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            <li
                class="nav-item {{ request()->is('admin/brands') || request()->is('admin/brands/*')  ? 'active' : '' }}">
                <a class="nav-link" href="/admin/brands">
                    <i class="fas fa-boxes"></i>
                    <p>Brands</p>
                </a>
            </li>
            <li
                class="nav-item {{ request()->is('admin/products') || request()->is('admin/products/*')  ? 'active' : '' }}">
                <a class="nav-link" href="/admin/products">
                    <i class="fas fa-car"></i>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./icons.html">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./maps.html">
                    <i class="fas fa-comment-dots"></i>
                    <p>Feedback</p>
                </a>
            </li>
            {{-- <li>
                <a class="nav-link" href="./notifications.html">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item active active-pro">
                <a class="nav-link active" href="upgrade.html">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>