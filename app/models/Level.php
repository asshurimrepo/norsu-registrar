<?php

class Level extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function requests()
	{
		return $this->hasMany('RequestItem');
	}
}
