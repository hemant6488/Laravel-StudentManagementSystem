<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{

	protected $table = 'students'; //associate model with a table
	protected $fillable = ['name', 'address', 'gender', 'passing_year'];
	public function interests(){
		return $this->belongsToMany('App\Interest', 'student_interest');
	}
}
