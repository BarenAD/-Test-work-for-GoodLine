@extends('layouts.main_layout')
@section('content')
    <div id="Welcome" style="display: block;">
        <div class="default_text_and_line_below">
            Добро пожаловать!
        </div>
        <br>
        <br>
        <div>
            Пользователь: User
            <br>
            <br>
            e-mail: user@gmail.com
            <br>
            <br>
            password: 12345678
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            Это <a href="https://docs.google.com/document/d/1-vBVaOV7Bk4vLWSFl5CgFE6kSsu6mm5KgTP_Ab70oq8/edit#heading=h.axn85snt0m21">тестовое задание</a> для GoodLine.
            <br>
            Выполнил <a href="https://vk.com/barenad">Малашин Павел</a>
            <br>
            e-mail: kemsubaren@mail.ru
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            Предисловие:
            <br>
            До этого момента у меня не было опыта работать вообще с каким-либо FrameWork'ом или BackEnd'ом. Вообще. Узнал о Laravel только из тестового задания. Ранее программировал только на JavaScript, я и не знал ничего другого :)
            <br>
            Поэтому разные части кода могут иметь разную структуру, это связанно с тем, что во время работы, разбирая Laravel, я находил новые возможности.
            <br>
            Не стал "ковыряться" в контроллере Laravel относящийся к авторизации. Воспользовался готовой его формой. Поэтому выход и вход перенаправляется на форму Laravel.
            <br>
            Не стал уже делать красивое оформление пагинации на странице пользователя. ._.
            <br>
            Поиск работает по заголовкам.
            <br>
            Заметил небольшой баг, но исправлять его уже не стал. При установке галочки "анонимно" можно выставить пометку "PRIVATE", тогда паста станет недоступна, ввиду того, что автор не укажется, а к "PRIVATE" пасты имеет доступ только автор.
            <br>
        </div>
    </div>
@endsection