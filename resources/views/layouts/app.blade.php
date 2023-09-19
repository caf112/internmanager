<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InternManager</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
       
        @yield('head')
    </header>

    <main class="index-container">
        <div class="wrapper">
        <div class="aside">
            @yield('aside')
        </div>
        <div class="content">
            @yield('content')
        </div>
        </div>
    </main>

    <footer>
        internmanager

    </footer>

</body>
</html>
