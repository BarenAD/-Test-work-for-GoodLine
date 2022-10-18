<?php


namespace App\Http\Controllers;


use App\Model\Pastes;
use Illuminate\Http\Request;

class POSTController extends Controller
{
    public function create_new_paste(Request $request)  //Контроллер, который принимает POST запрос на создание ПАСТЫ.
    {
        $life_time_serv = $request->input('life_time');
        $today = date("Y-m-d H:i:s");
        $new_paste = new Pastes();
        if ($life_time_serv > 0)
        {
            $futureday = date("Y-m-d H:i:s", time()+60*60*24*$life_time_serv);
            $new_paste->end_at = $futureday;
        }
        $new_paste->identify = strtotime($today)+rand(5, 15);
        $new_paste->title = $request->input('TitlePaste');
        $new_paste->author = $request->input('User');
        $new_paste->acess = $request->input('Access');
        $new_paste->paste = $request->input('Paste');
        $new_paste->created_at = $today;
        $new_paste->updated_at = $today;
        $result = $new_paste->save();
        if ($result == 1)
        {
            return $new_paste->identify;
        }
    }
}