<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use App\Student as Student; //telling it that we'll refer to our model as Student here.
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

    public function show(){
    	$students = Student::paginate(10);
        $user = Auth::user(); //sending the name of authenticated user to our view.
    	$viewData = array( //creating a data array for sending to our view.
    		'title' => "Student Management System",
    		'students' => $students,
            'authUsername' => $user->name
    		);
		return view('student.show', $viewData);
    }

    public function addView(){
        $interests = Interest::all();
        $viewData = array(
            'interests' => $interests
            );
        return view('student.add', $viewData);
    }

    public function add(Request $request){
    	$student = Student::create(Input::all()); //mass assignment
        
        //Display Flash msg on successful addition
        if( $student !== false){
            if(is_null($request->input("interests"))){
                //do nothing
            }else{ //if saving of student is successful and interests is not null sync interests
                $student->interests()->sync($request->input("interests")); 
            }
            Session::flash('message', "New student '" . $student->name . "' added successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Adding new student unsuccessful.");
            return redirect()->route('Student.show');
        }
    }

    public function editView($id){
        $student = Student::find($id);
        $interestsTable = Interest::all();
        $studentInterests = (string) $student->interests; //eagerloading :/
        $studentData = array(
            'student' => $student,
            'interestsTable' => $interestsTable,
            'studentInterests' => $studentInterests
            );
        //dd($strInterests);
        return view('student.edit', $studentData);
    }

    public function edit($id, Request $request){
        $student = Student::find($id);
        $student->name = $request->input("name");
        $student->address = $request->input("address");
        $student->gender = $request->input("gender");
        $student->passing_year = $request->input("passing_year");

        //Display flash msg on successful editing
        if($student->save()){
            if(is_null($request->input("interests"))){
                //do nothing
            }else{ //if saving of student is successful and interests is not null sync interests
                $student->interests()->sync($request->input("interests")); 
            }

            Session::flash('message', "Student '" . $student->name . "' updated successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Updating student unsuccessful.");
            return redirect()->route('Student.show');
        }

    }

    public function view($id){
        $student = Student::find($id);
        $student->interests;
        //dd($old);
        return view('student.view', $student);
    }

    public function delete($id){
    	$oldStudent = Student::find($id);

        //Display flash msg on successful deletion
        if(Student::destroy($id)){
            Session::flash('message', "Student '" . $oldStudent->name . "' deleted successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Deleting student unsuccessful.");
            return redirect()->route('Student.show');
        }
    }


}
