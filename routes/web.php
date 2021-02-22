<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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
    //return view('welcome');
    return "hello world";
});

Route::get('/', [PagesController::class,'index']);
Route::get('/about',[PagesController::class,'about']);

// Route::get('/about', function(){
//     return view('pages.about');
// });


// Route::get('/hello', function () {
//     //return view('welcome');
//     return '<h1>Hello World<h2>';
// });

// Route::get('/about/{name}/{id}', function ($name,$id){
//     return 'this is '.$name.' with id of '.$id;
// });