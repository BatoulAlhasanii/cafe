<header class="app-header navbar">
    <button id="admin-navbar-toggler" class="admin-navbar-toggler" type="button" data-toggle="sidebar-show">
        <div class="navbar-toggler-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-btn" type="submit">{{ __('Logout') }}</button>
            </form>
        </li>
    </ul>
</header>
