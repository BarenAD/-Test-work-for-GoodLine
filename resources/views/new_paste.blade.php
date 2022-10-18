@extends('layouts.main_layout')
@section('content')
	<div id="NewPaste">
		<div class="default_text" style="margin: 10px 0 0 5%;">
			Новая паста
		</div>
		<textarea id="TextReaderPaste" class="TextReaderPaste"></textarea>
		<div class="default_text_and_line_below">
			Дополнительные параметры пасты
		</div>
		<div style="width: 50%; float: left; margin: 10px;">
			<div class="LineFrameOptionalPasteSettings">
				<text>Время жизни:</text>
				<select id="SelectTimeLifePaste">
					<option selected value=0>Бесконечно</option>
					<option value=0.006944>10 минут</option>
					<option value=0.0416>1 час</option>
					<option value=7>1 неделя</option>
					<option value=14>2 недели</option>
					<option value=30>1 месяц</option>
					<option value=365>1 год</option>
				</select>
			</div>
			<div class="LineFrameOptionalPasteSettings">
				<text>Доступ:</text>
				<select id="SelectAccessPaste">
					<option selected value="PUBLIC">Публично</option>
					<option value="LINK">По ссылке</option>
					@auth
					<option value="PRIVATE">Приватная</option>
					@endauth
				</select>
			</div>
			<div class="LineFrameOptionalPasteSettings">
				<text>Заголовок пасты:</text>
				<input id="SelectTitlePaste" type="text" placeholder="название">
			</div>
			<div class="LineFrameOptionalPasteSettings">
				<text style="width: 30%;">Анонимно:</text>
				<input type="checkbox" id="SelectAnonymousPaste" style="width: 20%; float: left;">
				@guest
					<script>
						document.getElementById('SelectAnonymousPaste').disabled = true;
						document.getElementById('SelectAnonymousPaste').checked = true;
					</script>
				@endguest
				<input type="button" value="создать пасту" onclick="create_paste()">
			</div>
		</div>
	</div>
@endsection
