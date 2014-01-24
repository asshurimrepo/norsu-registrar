<?php

class RequirementsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'req');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reqs = Requirement::all();
        return View::make('requirements.index', compact('reqs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('requirements.create');
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

		Requirement::create(Input::all());

		return Redirect::route('requirements.index')->with('suc', 'New Requirement Added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('requirements.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$req = Requirement::find($id);
        return View::make('requirements.edit', compact('req'));
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

		Requirement::find($id)->update(Input::all());

		return Redirect::route('requirements.index')->with('suc', 'Requirement Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Requirement::find($id)->delete();
		return Redirect::back()->with('suc', 'Requirement Deleted.');
	}

}
