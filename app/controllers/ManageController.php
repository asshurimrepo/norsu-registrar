<?php

class ManageController extends BaseController {

	public function getIndex()
	{
		return $this->getDashboard();
	}

	public function getDashboard()
	{
		// $requests = Req::with('documents');
		// return $requests;
        return View::make('manage.dashboard');
	}

	
}
