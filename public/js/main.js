const formatDate = date => (date.getFullYear()+'-'+('0'+(date.getMonth() + 1)).slice(-2) + '-' + +('0'+date.getDate()).slice(-2)+' '+('0'+date.getHours()).slice(-2) + ':' + ('0'+date.getMinutes()).slice(-2) + ':' + ('0'+date.getSeconds()).slice(-2));

window.onload = () => {
	if (typeof Pastes !== undefined)
	{
		print_all_pastes_in_list(Pastes, "Right_Bar");	//При загрузке страницы вызовет функцию отрисовки всех паст в правом баре.
	}
};

function print_all_pastes_in_list(PASTES, DIV)	//Принимает пасты и "div", куда их надо вставить.
{
	let UsersPastes = [];
	let CountUserPastes = 0;
	let OtherPastes = [];
	let CountOtherPastes = 0;
	for (let i = 0; i < PASTES.length; i++) //Разбиение на пользовательские и анонимные
	{
		if (PASTES[i]['author'] === NameUser && PASTES[i]['author'] !== 'anonymous')
		{
			if (CountUserPastes < 10)
			{
				UsersPastes[CountUserPastes] = PASTES[i];
				CountUserPastes = CountUserPastes+1;
			}
		}
		else
		{
			if (CountOtherPastes < 10)
			{
				OtherPastes[CountOtherPastes] = PASTES[i];
				CountOtherPastes = CountOtherPastes+1;
			}
		}
	}
	if (CountUserPastes > 0)	//вывод по отдельности каждые
	{
		for (let i = 0; i < CountUserPastes; i++)
		{
			create_one_paste_in_list(true, UsersPastes[i]["title"], UsersPastes[i]["identify"], DIV);	//Создание строки пасты. Принимает параметр, является пользовательзователь - автором.
		}																										//Заголовок, идентификатор, "div", куда это нужно вывести
	}
	if (CountOtherPastes > 0)
	{
		for (let i = 0; i < CountOtherPastes; i++)
		{
			create_one_paste_in_list(false, OtherPastes[i]["title"], OtherPastes[i]["identify"], DIV);
		}
	}
}

function create_one_paste_in_list(OWNER, TITLE, IDENTIFY, DIV)	//Непосредственно эта функция
{	//Создаём элементы, настраиваем их.
	let RightBar = document.getElementById(DIV);
	let PasteBlock = document.createElement("div");
		PasteBlock.className = "Pate_block_in_right_bar";
	let Link = document.createElement("a");
		Link.href = "/paste/" + IDENTIFY;
	let Title = document.createTextNode(TITLE);

	if (OWNER)	//Если пользователь - автор, делаем фон зелёным.
	{
		PasteBlock.style.background = "#95FF83";
	}
	//Добавляем
	RightBar.appendChild(PasteBlock);
	PasteBlock.appendChild(Link);
	Link.appendChild(Title);
}

function search()	//Функция для кнопки, которая перебрасывает на страницу поиска
{
	document.location.replace("/search/" + document.getElementById("Search_Text").value);
}

function view_result_search()	//Вывод найденных паст в "div" (Result_Search)
{
	print_all_pastes_in_list(SearchPastes, "Result_Search");
}

function create_paste()	//Создание пасты.
{ //Создаются переменные и собираются параметры.
	let LifeTime = parseFloat(document.getElementById("SelectTimeLifePaste").value);
	let User_name = "";
	if (document.getElementById("SelectAnonymousPaste").checked)
	{
		User_name = "anonymous";
	}
	else
	{
		User_name = document.getElementById("UserName").innerHTML;
	}
	let PackagePaste =
		'TitlePaste=' + document.getElementById("SelectTitlePaste").value +
		'&Access=' + document.getElementById("SelectAccessPaste").value +
		'&User=' + User_name +
		'&Paste=' + document.getElementById("TextReaderPaste").value +
		'&life_time=' + LifeTime;
	//IF - ниже. Если заголовок не путой, не неопределён.
	if (document.getElementById("SelectTitlePaste").value != "" && document.getElementById("SelectTitlePaste").value != null && document.getElementById("SelectTitlePaste").value != undefined)
	{	//Создаём экземпляр класса.
		let model = new Model();
		model.POST_HttpRequest(PackagePaste, "/api/new_paste", view_identify);	//Передаём функцию запроса параметры.
	}
	else
	{
		alert("Необходимо задать заголовок вашей пасты");
	}
}

function view_identify(IDENTIFY)	//Вывод идентификатора пасты на экран
{	//Создание и описание элементов
	let Window = document.createElement('div');
		Window.className = 'WindowViewLinkPaste';
	let Text = document.createTextNode('Ссылка на пасту: ');
	let Link = document.createElement('input');
		Link.className = 'WindowViewLinkPasteInputText';
		Link.type = 'text';
		Link.value = 'http://127.0.0.1:8000/paste/' + IDENTIFY;
	let CloseWindow = document.createElement('input');
		CloseWindow.className = 'WindowViewLinkPasteInputButton';
		CloseWindow.type = 'button';
		CloseWindow.value = 'X';
		CloseWindow.onclick = () => {
										Window.remove();
										document.location.replace("/");
									};
	document.getElementsByTagName('body')[0].appendChild(Window); //Добавление их
	Window.appendChild(Text);
	Window.appendChild(CloseWindow);
	Window.appendChild(Link);
}

function test()	//Тест :)
{
	alert("TEST");
}