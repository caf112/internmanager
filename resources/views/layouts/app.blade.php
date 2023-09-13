<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
       
        @yield('head')
    </header>
    <main class="container">
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
    <script>
    // フッターをクリックした際にページの一番上にスクロールする関数
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth" // スムーズスクロールを有効にする
      });
    }

    // フッターをクリックしたら scrollToTop 関数を実行する
    document.getElementById("footer").addEventListener("click", scrollToTop);
  </script>
</body>
</html>

<!--
<header>
    <a href="/" class="site-title">企業一覧</a>
</header>