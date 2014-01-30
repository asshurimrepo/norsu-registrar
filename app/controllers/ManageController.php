<?php

class ManageController extends BaseController {

	public function getIndex()
	{
		return $this->getDashboard();
	}

	public function getDashboard()
	{
		$updatedDocs = RequestItem::with('request.student', 'document', 'level', 'label')->updated()->userAccess(Auth::user()->id)->get()->take(20);
        $totalCount = RequestItem::userAccess(Auth::user()->id)->count();
        $labels = Label::all();
        return View::make('manage.dashboard', compact('updatedDocs', 'totalCount', 'labels'));
	}

	public function getProceed($id)
	{
		$r = RequestItem::find($id);
		$l = Level::find($r->level_id);
		$nl = Level::where('order', $l->order+1)->first();

		$r->update(['level_id' => $nl->id]);
		return Redirect::to('manage')->with('suc', 'Request ID #'.$r->id.' has been updated!');
	}

	public function getRequest($id)
	{
		$r = RequestItem::with('request.student', 'document.requirements', 'label', 'level', 'taskDone')->find($id);
		return View::make('manage.request', compact('r'));

	}


	public function getLevel($id)
	{
		$updatedDocs = RequestItem::with('request.student', 'document', 'level', 'label')->where('level_id', $id)->updated()->get();
		$l = Level::find($id);
        $labels = Label::all();

		return View::make('manage.level', compact('updatedDocs', 'l', 'labels'));
	}
	
}
