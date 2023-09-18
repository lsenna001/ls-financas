<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS Finanças</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body >
    @include('base/navbar')
    <main class="d-flex justify-content-center">
        @yield('content')
    </main>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="chart/dist/chart.umd.js"></script>
    <script src="js/charts.js"></script>
</body>

</html>