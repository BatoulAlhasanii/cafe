<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('layout.head')
<body  class="admin">
    @auth
        @include('admin-layout.header')
        @include('admin-layout.sidebar')
    <div class="main-footer-wrapper">
        <main>
            @yield('content')
        </main>
        @include('admin-layout.footer')
    </div>
    @else
        <div>
            <main>
                @yield('content')
            </main>
        </div>
    @endauth

</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset(mix('/js/app.js')) }}"></script>
    @yield('javascript-scripts')

</html>
