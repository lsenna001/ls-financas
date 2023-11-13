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

<body>
    @include('base/navbar')

    @if(session('msg'))
    <div class="alert alert-{{session('msg')['type']}} alert-dismissible fade show container" role="alert">
        <strong><i class="fa fa-info-circle"></i></strong> {{session('msg')['msg']}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="d-flex justify-content-center">
        @yield('content')
    </main>

    @include('base/js')
    @yield('extra_script')
</body>

</html>
