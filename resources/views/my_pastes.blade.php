@extends('layouts.main_layout')
@section('content')
    <div id="UserPastes" style="display: block;">
        <div class="default_text_and_line_below">
            Ваши пасты:
        </div>
        <div style="width: 50%; float: left; margin: 10px;">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Номер</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Идентификатор</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_pastes as $paste)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$paste->title}}</td>
                            <td><a href="http://127.0.0.1:8000/paste/{{$paste->identify}}">{{$paste->identify}}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$user_pastes->links()}}
        </div>
    </div>
@endsection
