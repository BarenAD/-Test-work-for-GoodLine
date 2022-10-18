<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagination extends Controller
{
    public function uster_pastes()
    {
        $SQLController = new \App\Http\Controllers\SQLRequestController();
        $pastes = $SQLController->slect_table_on_right_bar();
        $user_pastes = $SQLController->select_table_on_users_pastes()->paginate(5);
        return view('my_pastes', compact('pastes'), compact('user_pastes'));
    }
}
