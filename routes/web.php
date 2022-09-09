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

     DB::insert('insert into posts(title, content) values(?,?)', ['New laravel', 'Laravel cest bon']);

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

// ELOQUENT

Route::get('/title', function(){
    $posts = Post::find (); 

    foreach($posts as $post){
        return $post->title;
    }

    
 });

 
Route::get('/look', function(){
    $post = Post::find(2); 

   
        return $post->title;
   

    
 });

 Route::get('/findwhere', function(){

   $new = Post::where('id',3)->orderBy('id','desc')->take(1)->get();

   return $new;

});


Route::get('/findmore',function(){

    $posts = Post::findOrFail(2);

    return $posts;

});


Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = 'New title enetered';
    $post->content = 'New content saved' ;

    $post->save();
});


Route::get('/basicinsert2', function(){

    $post = Post::find(4);

    $post->title = 'New title enetered 3';
    $post->content = 'New content saved 3' ;

    $post->save();
});

Route::get('/fill', function(){

    Post::create(['title'=>'the create method',
         'content'=>'content with created here added content']);
});


Route::get('/update', function(){

    Post::where('id',2)->update(['title'=>'update eloquent', 'content'=> 'not rocket sicence']);
     
});
    


