<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('head-links-scripts')

  <title> @yield('title','Cafe Odebrecht')</title>
</head>
