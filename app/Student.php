<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Support\Facades\Input;

class Student extends Model{
	protected $fillable = ['name', 'address', 'gender', 'passing_year'];
	
	public function interests(){
		return $this->belongsToMany('App\Interest', 'student_interest');
	}

    public static function validate(){
        $input = Input::all();
        return Validator::make($input, [
                'name' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'passing_year' => 'required'
            ]);
    }
}
