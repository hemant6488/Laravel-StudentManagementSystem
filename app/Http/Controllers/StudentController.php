<?php
namespace App\Http\Controllers;

use Auth;
use Validator;
use Session;
use App\Student as Student; 
use App\Interest as Interest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index() function that displays list of all students
    public function index(){
    	$students = Student::paginate(10);
        $user = Auth::user(); 
    	$viewData = array( 
    		'title' => "Student Management System",
    		'students' => $students,
            'authUsername' => $user->name
    		);
		return view('students.index', $viewData);
    }

    //function for rendering the new student form
    public function snew($try=0){
        $interests = Interest::all();
        $viewData = array(
            'interests' => $interests,
            'try' => $try // 0 = Initial render, 1 = Errors in data validation | for keeping track of backend validation, try will be set to 1, if backend validation fails.
            );
        return view('students.new', $viewData);
    }

    //function that handles post data from new student form
    public function create(Request $request){
        $input = Input::all();
        $validator = Validator::make($input, [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'passing_year' => 'required'
            ]);
        if($validator->fails()){
            return redirect()->route('students.new', array('try' => 1))->withErrors($validator)->withInput();
        } 
    	$student = Student::create(Input::all()); //mass assignment
        
        //Display Flash msg on successful addition
        if( $student !== false){
            if(is_null($request->input("interests"))){
                //do nothing
            }else{ //if saving of student is successful and interests is not null sync interests
                $student->interests()->sync($request->input("interests")); 
            }
            Session::flash('message', "New student '" . $student->name . "' added successfully. " );
            return redirect()->route('students.index');
        }
        else{
            Session::flash('message', "Adding new student unsuccessful.");
            return redirect()->route('students.index');
        }
    }

    //function for rendering edit form for a student.
    public function edit($id, $try=0){
        //$try = Input::get('try');//too keep track of backend validation, if try=1, then backend validation returned failed, and form needs to be repopulated with old values and not with the values in the database.
        //dd($try);
        try{
            $student = Student::findOrFail($id);
        } catch(Exception $e) {
            App::abort(404);
        }
        $interestsTable = Interest::all();
        $studentInterests = (string) $student->interests;
        $studentData = array(
            'student' => $student,
            'interestsTable' => $interestsTable,
            'studentInterests' => $studentInterests,
            'try' => $try
            );
        //dd($strInterests);
        return view('students.edit', $studentData);
    }

    //function that handles post requests from edit form
    public function update($id, Request $request){
        //------Validation-------
        $input = Input::all();
        $validator = Validator::make($input, [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'passing_year' => 'required'
            ]);
        if($validator->fails()){
            return redirect()->route('students.edit', array('id'=>$id, 'try' => 1))->withErrors($validator)->withInput();
        } 
        //-----End Validation-----

        try{
            $student = Student::findOrFail($id);
        } catch(Exception $e) {
            App::abort(404); //if student details not found in the database
        }
        $student->name = $request->input("name");
        $student->address = $request->input("address");
        $student->gender = $request->input("gender");
        $student->passing_year = $request->input("passing_year");

        //Display flash msg on successful updation
        if($student->save()){
            if(is_null($request->input("interests"))){
                //no interests then remove from pivot table, (by passing an empty array)
                $student->interests()->sync(array()); 
            }else{ //if saving of student is successful and interests is not null sync interests
                $student->interests()->sync($request->input("interests")); 
            }

            Session::flash('message', "Student '" . $student->name . "' updated successfully. " );
            return redirect()->route('students.index');
        }
        else{
            Session::flash('message', "Updating student unsuccessful.");
            return redirect()->route('students.index');
        }

    }

    //function to show individual students
    public function show($id){
        try{
            $student = Student::findOrFail($id);
        } catch(Exception $e) {
            App::abort(404);
        }
        $student->interests;
        //dd($old);
        return view('students.show', $student);
    }

    //function to delete a student entry
    public function destroy($id){
    	try{
            $oldStudent = Student::findOrFail($id);
        } catch(Exception $e) {
            App::abort(404);
        }

        //Display flash msg on successful deletion
        if(Student::destroy($id)){
            Session::flash('message', "Student '" . $oldStudent->name . "' deleted successfully. " );
            return redirect()->route('students.index');
        }
        else{
            Session::flash('message', "Deleting student unsuccessful.");
            return redirect()->route('students.index');
        }
    }

}
