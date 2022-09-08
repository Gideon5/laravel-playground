<?php

use Illuminate\Support\Facades\Route;
use  App\Models\Post;


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


 Route::get('/post/{id}/{name}', function($id, $name){
     return "Hi i am contact". $id . "" . $name;

    
 }
 );


 Route::get('/insert', function(){

     DB::insert('insert into posts(title, content) values(?,?)', ['PHP withn laravel', 'Laravel is bae']);

 });  

 Route::get('/read', function(){
    $results = DB::select('select * from posts where id = ?', [1]);

   return var_dump($results);

 });



 Route::get('/update', function(){

    $updated = DB::update('update posts set title="Updated title" where id = ?', [1]);

    return$updated;
    


 });
 

Route::get('/delete', function(){
 
    $deleted = DB::delete('delete from posts where id = ? ', [1]);
    return $deleted;

 });



Route::get('/title', function(){
    $posts = Post::all(); 

    foreach($posts as $post){
        return $post->title;
    }

    
 });

