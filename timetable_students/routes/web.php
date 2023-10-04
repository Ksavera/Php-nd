<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Homepage', [
        'logo' => 'FLATPACK',
        'title' => 'Start a New conversation',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam sequi obcaecati at officiis perspiciatis cupiditate voluptate est in ullam fuga.',
        'time' => 'Between 12:00 - 13:15',
        'author' => 'Mark Smith, Developer at Themeforest'
    ]);
});

Route::get('/students', function () {
    $file = '../database/data/data.json';
    $data = json_decode(file_get_contents($file), true);
    // return view('students', compact($data));
    return view('students', ['data' => $data]);
});
