<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('asset/renda/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="{{ asset('asset/renda/css/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/renda/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    @include('laytemps.navbar')

    <div class="container">
        @include('laytemps.title')
        @yield('content')
    </div>

    @include('laytemps.footer')

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('asset/renda/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/renda/js/jquery.bxslider.js') }}"></script>
    <script src="{{ asset('asset/renda/js/mooz.scripts.min.js') }}"></script>
</body>
</html>
