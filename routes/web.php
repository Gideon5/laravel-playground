<?php

use Illuminate\Support\Facades\Route;
use  App\Models\Post;
use  App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


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


//  Route::get('/post/{id}/{name}', function($id, $name){
//      return "Hi i am contact". $id . "" . $name;

    
//  }
//  );


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


Route::get('/del',function(){

    $post = Post::find(3);

    $post->delete();

});

Route::get('/del2', function(){
    Post::destroy([4,5]);

    Post::where('id', 2)->delete();



});

Route::get('/readsoftdel', function(){

    // $post ->Post::find(5);

    // return $post;


   $post = Post::withTrashed()->where('id',5)->restore();
    
});


//One to one
Route::get('/user/post/{id}', function($id){
   return User::find($id)->post->title;

});

Route::get('/post/{id}/user', function($id){

    return Post::find($id)->user->name;
});

//One To Many

Route::get('/posts', function(){

    $user = User::find(1);

    foreach($user->posts as $post){

       echo $post->title ."<br>";

    }

});


///many to many

Route::get('/user/{id}/role', function($id){


    $user = User::find($id)->roles()->get();

    return $user;

    
    // foreach($user->roles as $role){
    //     return $role->name;
    // }

});


// ACCESSING THE PIVOT TABLE
Route::get('/user/pivot', function(){
    $user = User::find(1);

    foreach($user->roles as $role){

        echo $role->pivot;
    }

});
hello world

    


