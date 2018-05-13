<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/"
        crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="@yield('page-name')">
    <nav class="site-nav">
        <div class="site-nav__logo">BePro.Life</div>
    </nav>

    <main id="app" class="site-main">
        @yield('content')
    </main>

    <footer class="site-footer text-center">
        Copyright &copy; 2018. <a href="#">BePro.Life</a>
    </footer>

    <div class="notification-panel">
        <alert-panel></alert-panel>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>

</html>