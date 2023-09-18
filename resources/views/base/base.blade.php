<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS Finanças</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{asset('img/login.png')}}">
</head>

<body >
    @include('base/navbar')
    <main class="d-flex justify-content-center">
        @yield('content')
    </main>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('chart/dist/chart.umd.js')}}"></script>
    <script src="{{asset('js/charts.js')}}"></script>
</body>

</html>