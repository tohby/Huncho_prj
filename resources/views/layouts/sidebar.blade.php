<div class="sidebar" data-image="{{ asset('images/sidebar-1.jpg') }}">
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
            @if ( Auth::user()->role == 0 )
            <li class="nav-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/users">
                    <i class="fas fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
            @endif
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
            <li
                class="nav-item {{ request()->is('admin/orders') || request()->is('admin/orders/*')  ? 'active' : '' }}">
                <a class="nav-link" href="/admin/orders">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Orders</p>
                </a>
            </li>
            {{-- <li
                class="nav-item {{ request()->is('admin/feedbacks') || request()->is('admin/feedbacks/*')  ? 'active' : '' }}">
            <a class="nav-link" href="/admin/feedbacks">
                <i class="fas fa-comment-dots"></i>
                <p>Feedback</p>
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