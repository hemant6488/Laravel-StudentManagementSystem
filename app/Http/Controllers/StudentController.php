<?php
namespace App\Http\Controllers;

use Auth;
use Session;
use App\Student as Student; //telling it that we'll refer to our model as Student here.
use App\Interest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    	$students = Student::all();
        $user = Auth::user(); //sending the name of authenticated user to our view.
    	$data = array( //creating a data array for sending to our view.
    		'title' => "Student Management System",
    		'students' => $students,
            'authName' => $user->name
    		);
		return view('show', $data);
    }


    public function add(Request $request){
    	//$name = $request->input("name"); //changes with laravel versions
    	$student = new Student;
    	$student->name = $request->input("name");
    	$student->address = $request->input("address");
    	$student->gender = $request->input("gender");
    	$student->passing_year = $request->input("passing_year");
        
        //Display Flash msg on successful addition
        if($student->save()){
            $student->interests()->sync($request->input("interests")); //if saving of student is successful sync interests
            Session::flash('message', "New student '" . $student->name . "' added successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Adding new student unsuccessful.");
            return redirect()->route('Student.show');
        }
    }

    public function editView($id){
        $old = Student::find($id);
        $old->interests;
        return view('edit', $old);
    }

    public function edit($id, Request $request){
        $student = Student::find($id);
        $student->name = $request->input("name");
        $student->address = $request->input("address");
        $student->gender = $request->input("gender");
        $student->passing_year = $request->input("passing_year");

        //Display flash msg on successful editing
        if($student->save()){
            $student->interests()->sync($request->input("interests")); //if saving of student is successful sync interests
            Session::flash('message', "Student '" . $student->name . "' updated successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Updating student unsuccessful.");
            return redirect()->route('Student.show');
        }

    }

    public function view($id){
        $old = Student::find($id);
        $old->interests;
        //dd($old);
        return view('view', $old);
    }

    public function delete($id){
    	$old = Student::find($id);

        //Display flash msg on successful deletion
        if(Student::destroy($id)){
            Session::flash('message', "Student '" . $old->name . "' deleted successfully. " );
            return redirect()->route('Student.show');
        }
        else{
            Session::flash('message', "Deleting student unsuccessful.");
            return redirect()->route('Student.show');
        }
    }

}
