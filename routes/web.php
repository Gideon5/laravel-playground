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


// Route::get('/post/{id}/{name}', function($id, $name){
//     return "Hi i am contact". $id . "" . $name;

    
// }
// );


// Route::get('/insert', function(){

//     DB::insert('insert into posts(title, content) values(?,?)', ['PHP withn laravel', 'Laravel is bae']);

// });  

 