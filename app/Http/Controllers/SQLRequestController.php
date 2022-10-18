<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SQLRequestController extends Controller
{
    public function slect_table_on_right_bar()
    {
        if (Auth::check()) {
            return DB::table('pastes')->select('title', 'identify', 'author')->where([['end_at', '>', date("Y-m-d H:i:s")],
                ['acess', '=', 'PUBLIC']])
                ->orWhere([['end_at', '=', null],
                    ['acess', '=', 'PUBLIC']])
                ->orwhere([['end_at', '>', date("Y-m-d H:i:s")],
                    ['author', '=', Auth::user()->name]])
                ->orWhere([['end_at', '=', null],
                    ['author', '=', Auth::user()->name]])
                ->orderBy('created_at', 'DESC')->get();
        } else {
            return DB::table('pastes')->select('title', 'identify', 'author')->where([['end_at', '>', date("Y-m-d H:i:s")],
                ['acess', '=', 'PUBLIC']])
                ->orWhere([['end_at', '=', null],
                    ['acess', '=', 'PUBLIC']])
                ->orderBy('created_at', 'DESC')->get();
        }
    }

    public function slect_table_on_identify($identify)
    {
        if (Auth::check()) {
            return DB::table('pastes')->where([['identify', $identify],
                ['end_at', '>', date("Y-m-d H:i:s")],
                ['acess', '<>', 'PRIVATE']])
                ->orWhere([['identify', $identify],
                    ['end_at', '=', null],
                    ['acess', '<>', 'PRIVATE']])
                ->orWhere([['identify', $identify],
                    ['end_at', '>', date("Y-m-d H:i:s")],
                    ['acess', '=', 'PRIVATE'],
                    ['author', '=', Auth::user()->name]])
                ->orWhere([['identify', $identify],
                    ['end_at', '=', null],
                    ['acess', '=', 'PRIVATE'],
                    ['author', '=', Auth::user()->name]])->first();
        } else {
            return DB::table('pastes')->where([['identify', $identify],
                ['end_at', '>', date("Y-m-d H:i:s")],
                ['acess', '<>', 'PRIVATE']])
                ->orWhere([['identify', $identify],
                    ['end_at', '=', null],
                    ['acess', '<>', 'PRIVATE']])->first();
        }
    }

    public function slect_table_on_search($key_search)
    {
        return DB::table('pastes')->select('title', 'identify', 'author')->where([['title', 'like', $key_search],
            ['acess', '=', 'PUBLIC'],
            ['end_at', '>', date("Y-m-d H:i:s")]])
            ->orWhere([['title', 'like', $key_search],
                ['acess', '=', 'PUBLIC'],
                ['end_at', '=', null]])->get();
    }

    public function select_table_on_users_pastes()
    {
        return DB::table('pastes')->where([['author', '=', Auth::user()->name],
            ['end_at', '>', date("Y-m-d H:i:s")]])
            ->orWhere([['author', '=', Auth::user()->name],
                ['end_at', '=', null]]);
    }
}
