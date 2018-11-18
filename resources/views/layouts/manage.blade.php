<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Management Panel</title>

<<<<<<< HEAD
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

=======
>>>>>>> bb6f347a3d54edf61cab62cbff3239efb97dd4f1
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('_includes.nav.main')

    @include('_includes.nav.manage')
<<<<<<< HEAD
    <div id="app">
        @yield('content')
    </div>
=======
    <div class="management-area" id="app">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
>>>>>>> bb6f347a3d54edf61cab62cbff3239efb97dd4f1
</body>
</html>
