<?php

class TestController extends BaseController {

	function getRequest(){

		$r = Req::with('reasons','documents','student','documents.requirements')->get();
		return $r;
	}

	public function getStudent()
	{
		$s = Student::with('requests', 'requests.reasons', 'requests.documents')->get();
		return $s;
	}

	public function getUserLevel()
	{
		$u = User::with('accessLevel')->first();
		return $u->accessLevel->first()->pivot->status;
	}

	public function getLists()
	{
		return User::find(2)->accessLevel->lists('name', 'id');
	}

	public function getPivot()
	{
		// $req = Req::first()->documents()->access(10)->orderBy('document_request.updated_at', 'desc')->get();
		$req = RequestItem::with('request.student', 'document', 'level')->UserAccess(Auth::user()->id)->get();

		return $req;
	}



}
