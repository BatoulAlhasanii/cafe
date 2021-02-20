<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  @include('layout.head')

  <body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

    <div class="@yield('page-wrapper')">
      @yield('header',\View::make('layout.header'))
      <div class="page-main-content">
        @yield('content')
      </div>
      @yield('footer',\View::make('layout.footer'))
    </div>

  </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{ asset(mix('/js/app.js')) }}"></script>
  @yield('javascript-scripts')

</html>
