<?php

class Document extends Eloquent {
	protected $guarded = array('requirement_id', 'DataTables_Table_0_length');

	public static $rules = array();

	public function scopeExceptOthers($q)
	{
		return $q->where('others', 0);
	}

	public function scopeOthers($q)
	{
		return $q->where('others', 1);
	}

	public function requirements()
	{
		return $this->belongsToMany('Requirement');
	}

	public function requests()
	{
		return $this->belongsToMany('Req', 'document_request', 'document_id', 'request_id')->withPivot('status');
	}


	public function rstatus($label = false)
	{
		$status = $this->pivot->status;

		switch ($status) {
			case 1:
				return $label ? 'success' :'<span class="label label-success">Done</span>';
				break;
			
			default:
				return $label ? '' :'<span class="label label-default">Pending</span>';
				break;
		}

	}
}
