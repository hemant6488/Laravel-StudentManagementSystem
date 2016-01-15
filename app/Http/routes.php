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
	return redirect()->route('Student.show');
});

//Route for ajax email validation
Route::post('check', function(){
	$input['email'] = Input::get('email');
	$validator = Validator::make($input, [
            'email' => 'unique:users'
        ]);
	if($validator->fails()){
		$result = "Email already exists";
	}
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
	Route::get('/show', ['as' => 'Student.show', 'uses' => 'StudentController@show']);

	//Routes that handle addition of a new student
	Route::get('/add', ['as' => 'Student.add', function(){ return view('add'); }]);
	Route::post('/add', 'StudentController@add');

	//Route that handle viewing of a student details
	Route::get('/view/{id}', ['as' => 'Student.view', 'uses' => 'StudentController@view']);

	//Route that handle editing of a student details
	Route::get('edit/{id}', ['as' => 'Student.edit', 'uses' => 'StudentController@editView']);
	Route::post('edit/{id}', 'StudentController@edit');	//id sent as a url argument from editstudent view.

	//Route that handles student deletion
	Route::get('delete/{id}', ['as' => 'Student.delete', 'uses' => 'StudentController@delete']);


	Route::post('ajax', function() { // callback instead of controller method
	    $user = App\User::find(\Input::get('id'));
	    return $user; // Eloquent will automatically cast the data to json
	});


});