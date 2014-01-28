<?php

class RequestItem extends Eloquent {
	protected $guarded = array();
	protected $table = 'document_request';

	public function document()
	{
		return $this->belongsTo('Document');
	}

	public function request()
	{
		return $this->belongsTo('Req');
	}

	public function level()
	{
		return $this->belongsTo('Level');
	}

	public function label()
	{
		return $this->belongsTo('Label');
	}

	public function scopeUserAccess($q, $user_id){
		$user = User::find($user_id);
		$access_id = count($user->getAccessLevelLists()) ? $user->getAccessLevelLists() : [0];
		return $q->whereIn('level_id', $access_id);
	}

	public function scopeUpdated($q)
	{
		return $q->orderBy('updated_at', 'desc');
	}

	public function date($field, $format = 'M d, y h:i a ')
	{
		return date($format, strtotime($this->$field));
	}

	public static $rules = array();
}
