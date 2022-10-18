
class Model
{
    POST_HttpRequest(PackagePOST, API, CALLBACK)
    {
        var request_for_server = new XMLHttpRequest();
        request_for_server.open("POST", API, true);
        request_for_server.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request_for_server.onreadystatechange = () =>
        {
            if (request_for_server.readyState != 4)
            {
                return;
            }
            if (request_for_server.status != 200)
            {
                console.log("Ошибка запроса к серверу!\n" + request_for_server.status + ': ' + request_for_server.statusText );
            }
            else
            {
                if (API == '/api/new_paste')
                {
                    //console.log("Ваша ссылка доступна по ссылке: 'http://127.0.0.1:8000/paste/" + request_for_server.response + "'");
                    CALLBACK(request_for_server.response);
                }
            }
        };
        request_for_server.send(PackagePOST);
    }
}