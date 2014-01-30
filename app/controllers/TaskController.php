<?php

class TaskController extends BaseController {

	public function postDone()
	{
		$data = Input::except('status');

		if(Input::get('status') == "true"):
			TaskDone::create($data);
		else:
			TaskDone::where('document_request_id', Input::get('document_request_id'))->where('ref_id', Input::get('ref_id'))->where('type', Input::get('type'))->delete();
		endif;
	}

}
