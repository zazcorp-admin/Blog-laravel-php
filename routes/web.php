<?php
use App\models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController as bg;
use PhpParser\Node\Stmt\Foreach_;

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

Route::resource('blog', bg::class);
Route::get('contact', [bg::class, 'contact']);
Route::get('blog/{id}/', [bg::class, 'show']);
Route::get('posting/{id}/{name}/{pass}', [bg::class, 'show_post']);


Route::get('insert', function () {
    DB::insert('insert into posts (title, content) values (?, ?)', ['learing php', 'learning php with laravel']);
});


Route::get('/read', function(){
    $results = DB::select('select * from posts where id = ?', [1]);
    // return var_dump($results);
    return $results;


    // foreach ($results as $posts) {
    //     return $posts->title;
    // }
});


Route::get('/update', function(){
    $updated = DB::update("update posts set title = 'update title' where id = ?", ['1']);

    return $updated;
});



Route::get('/delete', function(){
    $del =  DB::delete('delete from posts where id = ?', ['2']);

    // this code wqork for me for delte
    // $del = DB::table('posts')->where('id', 1)->delete();
    return $del;
});


Route::get('/read', function(){
    $posts = Post::all();
    
    foreach ($posts as $post) {
        # code...
        return $post->title;
    }
});


Route::get('/find', function(){
    $posts = Post::find(3);
    return $posts->title;
});