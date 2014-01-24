<?php

class Student extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function requests()
	{
		return $this->hasMany('Req');
	}

	public function fullName()
	{
		return $this->lname.', '.$this->fname.' '.$this->mname;
	}
}
