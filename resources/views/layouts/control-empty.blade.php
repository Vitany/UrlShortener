<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/favicon.png" />
</head>
<body class="@section('body-classes') bg-gradient-primary @endsection">

<div class="container vue-app">
    @yield('content')
</div>

<script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
