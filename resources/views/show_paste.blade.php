@extends('layouts.main_layout')
@section('content')
    <div id="ShowPaste" style="display: block;">
        <div class="default_text" style="margin: 10px 0 0 5%;">
            {{$paste->title}}
        </div>
        <textarea id="TextReaderPaste" class="TextReaderPaste">{{$paste->paste}}</textarea>
        <div class="default_text_and_line_below">
            Дополнительные параметры пасты
        </div>
        <div style="width: 50%; float: left; margin: 10px;">
            <div class="LineFrameOptionalPasteSettings">
                <text>Автор:</text>
                <text>{{$paste->author}}</text>
            </div>
            <div class="LineFrameOptionalPasteSettings">
                <text>Дата создания</text>
                <text>{{$paste->created_at}}</text>
            </div>
            <div class="LineFrameOptionalPasteSettings">
                <text>Текущая дата</text>
                <text>{{$current_date}}</text>
            </div>
            <div class="LineFrameOptionalPasteSettings">
                <text>Дата удаления</text>
                <text>{{$paste->end_at}}</text>
            </div>
            <div class="LineFrameOptionalPasteSettings">
                <text>Доступ:</text>
                <text>{{$paste->acess}}</text>
            </div>
        </div>
    </div>
@endsection