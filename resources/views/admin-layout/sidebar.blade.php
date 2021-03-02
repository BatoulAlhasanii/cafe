<div id="navbarNav" class="sidebar">
    <div>
        <ul class="list-unstyled list-group list-group-flush mb-4">
            <li class="nav-item img-wrapper">
                <a href="{{ route('dashboard') }}" aria-current="page" class="sidebar-nav-link">
                    <img src="{{ asset('/storage/images/header/logo.png') }}" alt="..." class="img-fluid">
                </a>
            </li>
            @if(auth()->user()->hasPermission('view-dashboard') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" aria-current="page" class="sidebar-nav-link">Dashboard</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-categories') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="sidebar-nav-link">Categories</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-flavors') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('flavors.index') }}" class="sidebar-nav-link">Flavors</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-products') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="sidebar-nav-link">Products</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-orders') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="sidebar-nav-link">Orders</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-users') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="sidebar-nav-link">Users</a>
            </li>
            @endif
            @if(auth()->user()->hasPermission('view-settings') || auth()->user()->hasPermission('manage-database'))
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="sidebar-nav-link">Settings</a>
            </li>
            @endif
        </ul>
    </div>
</div>
