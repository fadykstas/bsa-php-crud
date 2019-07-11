<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function (){
    return "hello, world. OMG, it works ¯\_(ツ)_/¯";
});

Route::get('hello/{name}', function ($name){
    return "hello, {$name}. OMG, it works ¯\_(ツ)_/¯";
})->where(['name' => '[A-z]+'])->name('profile');


Route::get('hello/{name}/city/{city?}', function($name, $city = 'Kiev') {
    return "hello, {$name} from {$city}. OMG, it works ¯\_(ツ)_/¯";
});
