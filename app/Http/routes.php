<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* //Testing out stuff.

Route::get('hello/{name}', function($name){
	echo "hello " . $name;
});


//read an item
Route::get('test', function(){
	echo '<form action="test" method="POST">';
	echo '<input type="submit" value="submit">';
	echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
	echo '</form>';

});

//create an item
Route::post('test', function(){
	echo 'yay it worked.';
});

//update an item
Route::put();

// //remove an item
Route::delete();
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
