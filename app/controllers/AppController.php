<?php

class AppController extends BaseController {

	public function getIndex()
	{
		Session::forget('stud');
		return View::make('app.findstudent');
	}

	public function postFindStudent()
	{
		$keyword = Input::get('find_key');
		$stud = Student::where('studentID', $keyword)->first();


		if(!$stud) return Redirect::back()->with('err', '<b>Sorry we cannot begin your request. We havent found any matching records!</b>');

		Session::put('stud', $stud);

		return Redirect::to('app/begin');
		//return $stud;
	}


	public function getBegin()
	{
		if(!Session::has('stud')) return Redirect::to('app');

		$stud = Session::get('stud');
		$docs = Document::orderBy('name', 'asc')->get();
		$reasons = Reason::orderBy('name', 'asc')->get();

		return View::make('app.begin', compact('stud', 'docs', 'reasons'));
	}


	public function postSendRequest($id)
	{
		$docs = Input::get('docs');
		$reasons = Input::get('reasons');

		$req = Req::create(['student_id'=>$id]);
		$req->documents()->sync($docs);
		$req->reasons()->sync($reasons);

		return Redirect::to('app/success');
	}


	public function getSuccess()
	{
		return View::make('app.success');
	}



}
