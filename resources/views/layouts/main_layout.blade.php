<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Pastebin от BARENAD</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/login_list.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico?ver=2.3.0" type="image/x-icon">
    <script src="/js/model.js"></script>
    <script src="/js/main.js"></script>
</head>

@if (isset($pastes))
<script>
        var Pastes = JSON.parse('<?php echo $pastes;?>');
</script>
@endif

@if (Auth::check())
    <script>
        var NameUser = "{{Auth::user()->name}}";
    </script>
@else
    <script>
        var NameUser = "anonymous";
    </script>
@endif

<body>
    <div class="Header_area">
        <div class="Header_container_area">
            <a href="/">
                <div class="logo_analog_pastebin">
                    PASTEBIN
                    <br>
                    BY BARENAD
                </div>
            </a>
            <a href="/new_paste"> <input type="button" value="+ New paste" class="Button_New_Paste"> </a>
            <div class="search_div">
                <input id="Search_Text" type="text" placeholder="поиск...">
                <img src="/img/search.png" onclick="search()">
            </div>
            <div class="login_list">
                @guest
                    <ul id="menu_list_ghost" class="login_sublist"">
                    <li><a href="/register">Зарегистрироваться</a></li>
                    <li><a href="/home">Войти</a></li>
                    </ul>
                @endguest
                @auth
                    <ul id="menu_list_users" class="login_sublist">
                        <!--
                        <li><a href="">Мои настройки</a></li>
                        <li><a href="">Мои оповещения</a></li>
                        <li><a href="">Мои сообщения</a></li>
                        -->
                        <li><a href="/my_pastes">Мои пасты</a></li>
                        <li><a href="/home">Выйти</a></li>
                    </ul>
                @endauth
            </div>
            @guest
                <img id="avatar" class="avatar" src="/img/guest.png">
                <UserName id="UserName" class="UserName">Guest User</UserName>
            @endguest
            @auth
                <img id="avatar" class="avatar" src="/img/guest.png">
                <UserName id="UserName" class="UserName">{{Auth::user()->name}}</UserName>
                <script>

                </script>
            @endauth
        </div>
    </div>
    <div class="Basic_area">
        <div id="ContentArea" class="ContentArea">
            @yield('content')
        </div>
        <div id="Right_Bar" class="Right_Bar_area"></div>
    </div>
</body>

</html>