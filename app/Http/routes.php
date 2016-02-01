<?php
use Illuminate\Support\Facades\Input;
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

Route::get('/', function(){
	return redirect()->route('students.index');
});

//Route for ajax email validation
Route::post('/check', function(){
	$input['email'] = Input::get('email');
        $validator = Validator::make($input, [
                'email' => 'unique:users'
            ]);
        if($validator->fails()){
            $result = "Email already exists";
        } else {$result = null;}
        return json_encode($result);
});



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


/*
In Laravel 5.2 the middleware handling session and authentication are grouped in the default web group.

So, you have to put all the routes you want to be authenticated inside this group:
*/

Route::group(['middleware' => 'web'], function () {
    
	//implicit authentication routes located @ /vendor/laravel/framework/src/Illuminate/Routing/Router.php
    Route::auth();

    //Main dashboard of the app that displays all students
	Route::get('/students', ['as' => 'students.index', 'uses' => 'StudentController@index']);

	//Routes that handle addition of a new student
	Route::get('/students/new/', ['as' => 'students.new', 'uses' => 'StudentController@snew']);
	Route::post('/students', ['as' => 'students.create', 'uses' => 'StudentController@create']);

	//Route that handles showing a student details
	Route::get('/students/{id}', ['as' => 'students.show', 'uses' => 'StudentController@show']);

	//Route that handle editing of a student details
	Route::get('/students/{id}/edit/', ['as' => 'students.edit', 'uses' => 'StudentController@edit']);
	Route::post('/students/{id}', ['as' => 'students.update', 'uses' => 'StudentController@update']);	//id sent as a url argument from editstudent view.

	//Route that handles student deletion
	Route::get('/students/{id}/destroy', ['as' => 'students.destroy', 'uses' => 'StudentController@destroy']);

	Route::get('/logout', function(){
		Auth::logout();
		return view('auth.logout');
	});

	Route::post('ajax', function() { // callback instead of controller method
	    $user = App\User::find(\Input::get('id'));
	    return $user; // Eloquent will automatically cast the data to json
	});


});