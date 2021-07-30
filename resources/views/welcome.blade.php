<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crud Produtos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Crud Produtos - Laravel
            </div>

            <div class="links">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/produto') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Acesso</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Cadastre-se</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</body>

</html>