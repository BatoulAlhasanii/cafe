<div id="navbarNav" class="sidebar">
    <div>
        <ul class="list-unstyled list-group list-group-flush mb-4">
            <li class="nav-item img-wrapper">
                <a href="{{ route('dashboard') }}" aria-current="page" class="sidebar-nav-link">
                    <img src="{{ asset('/storage/images/header/logo.png') }}" alt="..." class="img-fluid">
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" aria-current="page" class="sidebar-nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="sidebar-nav-link">Categories</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="sidebar-nav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-nav-link">Orders</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-nav-link">Users</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-nav-link">Permissions</a>
            </li>
        </ul>
    </div>
</div>
