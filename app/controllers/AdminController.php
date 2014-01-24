<?php

class AdminController extends BaseController {

	public function getIndex($all = false)
	{
		Session::put('active', 'doc');

		if(!$all)
		$reqs = Req::with('reasons','documents','student','documents.requirements')->orderBy('id','asc')->where('status', '!=', 2)->get();
		else
		$reqs = Req::with('reasons','documents','student','documents.requirements')->orderBy('id','asc')->get();

		return View::make('admin.index', compact('reqs'));
	}

	public function getAllRequest()
	{
		return $this->getIndex(true);
	}

	public function getRequest($id)
	{
		$r = Req::with('reasons','documents','student','documents.requirements')->find($id);

		if($r->status == 0){
			$r->status = 1;
			$r->save();
			Session::flash('suc2', 'The Request (R# '.$r->id.') is marked as Recieved!');
		}

		return View::make('admin.request', compact('r'));

	}

	public function markDocument($r_id, $d_id, $status = 1)
	{
		$r = Req::with('documents')->find($r_id);
		$d = $r->documents->find($d_id);
		$d->pivot->status = $status;
		$d->pivot->save();
		# code...
	}

	public function getMarkDone($r_id, $d_id)
	{
		
		$this->markDocument($r_id, $d_id);
		return Redirect::back()->with('suc', 'Marked as Done!');
		
		// return 
	}

	public function getMarkUndone($r_id, $d_id)
	{

		$this->markDocument($r_id, $d_id, 0);
		return Redirect::back()->with('suc', 'Marked as Pending!');
		
		// return 
	}

	public function getMarkCLeared($r_id)
	{
		$r = Req::find($r_id);
		$r->status = 2;
		$r->save();

		return Redirect::to('/')->with('suc', 'Request (R# '.$r->id.') Is been marked as Cleared!');
	}

}
