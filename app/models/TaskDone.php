<?php

class TaskDone extends Eloquent {
	protected $table = 'task_done';
	protected $guarded = array();

	public static $rules = array();

	
	public function requestItem()
	{
		return $this->belongsTo('RequestItem');
	}
}
