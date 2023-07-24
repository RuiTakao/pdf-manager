<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>PDF Manager</title>
</head>
<body>
    <div class="base_container">
        <header class="header">
            <div class="container">
                <h1 class="header_title">PDF Manager</h1>
            </div>
        </header>
        <main class="main">
            <div class="container">
                @yield('content')
            </div>
    </div>
    </main>
</body>
</html>
