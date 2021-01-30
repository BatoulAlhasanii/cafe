<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  @include('layout.head')

  <body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

    <div class="@yield('page-wrapper')">
      @yield('header',\View::make('layout.header'))
      <div class="page-main-content">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>

  </body>
  <script src="{{ asset(mix('/js/app.js')) }}"></script>
  @yield('javascript-scripts')

</html>
