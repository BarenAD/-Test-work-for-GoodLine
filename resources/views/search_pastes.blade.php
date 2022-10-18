@extends('layouts.main_layout')
@section('content')
    <div id="Result_Search">
        <div class="default_text_and_line_below">
            Результат поиска:
        </div>
        <script>
            var SearchPastes = JSON.parse('<?php echo $searh_pastes;?>');
            view_result_search();
        </script>
    </div>
@endsection
