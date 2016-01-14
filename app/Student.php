<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model{

	protected $table = 'students'; //associate model with a table
	
	public function interests(){
		return $this->belongsToMany('App\Interest', 'student_interest');
	}
}
