<?php

class Req extends Eloquent {
	protected $guarded = array();
	protected $table = "requests";

	public static $rules = array();

	public function student()
	{
		return $this->belongsTo('Student');
	}

	public function documents()
	{
		return $this->belongsToMany('Document', 'document_request', 'request_id', 'document_id')->withPivot('status', 'level_id')->withTimestamps();
	}

	public function updatedDocuments()
	{
		return $this->documents()->access(Auth::user()->id)->orderBy('document_request.updated_at', 'desc');
	}

	public function reasons()
	{
		return $this->belongsToMany('Reason', 'reason_request', 'request_id', 'reason_id');
	}

	
	

	public function status()
	{
		switch ($this->status) {
			case 1:
				return '<span class="label label-warning">Recieved</span>';
				break;

			case 2:
				return '<span class="label label-success">Cleared</span>';
				break;
			
			default:
				return '<span class="label label-default">Pending</span>';
				break;
		}
	}

	public function stclass()
	{
		switch ($this->status) {
			case 1:
				return 'warning';
				break;

			case 2:
				return 'success';
				break;
			
			default:
				return '';
				break;
		}
	}
}
