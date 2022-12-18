<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.admin_name', 'Админ панель') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="/js/jquery.js" defer=""></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        @include('admin.partials.right-menu')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
