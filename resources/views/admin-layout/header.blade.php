<header class="app-header navbar">
    <button class="navbar-toggler" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
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
