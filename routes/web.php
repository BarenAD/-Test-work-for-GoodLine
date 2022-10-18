<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Искал я как построить условие по типу:   E1 AND (E2 OR E3)   но ничего путного не нашёл,
 * сделал по типу:   (E1 AND E2) OR (E1 AND E3)  (где E - какое-либо условие)
 *
 */

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $SQLController = new \App\Http\Controllers\SQLRequestController();
    $pastes = $SQLController->slect_table_on_right_bar();
    return view('welcome', compact('pastes'));
});



Route::get('/new_paste', function () {
    $SQLController = new \App\Http\Controllers\SQLRequestController();
    $pastes = $SQLController->slect_table_on_right_bar();
    return view('new_paste', compact('pastes'));
});



Route::get('/paste/{identify_paste}', function ($identify) {
    $SQLController = new \App\Http\Controllers\SQLRequestController();
    $pastes = $SQLController->slect_table_on_right_bar();
    $paste =  $SQLController->slect_table_on_identify($identify);
    $current_date = date("Y-m-d H:i:s");
    return view('show_paste', compact('pastes'))->with('current_date', $current_date)->with('paste', $paste);
});

Route::get('/search/{key_search_paste}', function ($key_search) {
    $SQLController = new \App\Http\Controllers\SQLRequestController();
    $key_search = '%' . $key_search . '%';
    $pastes = $SQLController->slect_table_on_right_bar();
    $searh_pastes = $SQLController->slect_table_on_search($key_search);

    return view('search_pastes', compact('pastes'), compact('searh_pastes'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/my_pastes', 'Pagination@uster_pastes');
