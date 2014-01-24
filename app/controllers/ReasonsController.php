<?php

class ReasonsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'rea');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$res = Reason::all();
        return View::make('reasons.index', compact('res'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('reasons.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(),['name'=>'required|min:2']);
		if($v->fails()) return Redirect::back()->withErrors($v);

		Reason::create(Input::all());

		return Redirect::route('reasons.index')->with('suc', 'New Reason Added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('reasons.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$r = Reason::find($id);
        return View::make('reasons.edit', compact('r'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$v = Validator::make(Input::all(),['name'=>'required|min:2']);
		if($v->fails()) return Redirect::back()->withErrors($v);

		Reason::find($id)->update(Input::all());

		return Redirect::route('reasons.index')->with('suc', 'Reason Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Reason::find($id)->delete();
		return Redirect::back()->with('suc', 'Reason Deleted.');

	}

}
