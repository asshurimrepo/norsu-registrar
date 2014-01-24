<?php

class DocumentsController extends BaseController {

	public function __construct()
	{
		Session::put('active', 'doc');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$docs = Document::all();
        return View::make('documents.index', compact('docs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('documents.create');
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
		
		$doc = Document::create(Input::all());
		$doc->requirements()->sync(Input::get('requirement_id'));

		return Redirect::route('documents.index')->with('suc', 'New Document Type Added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('documents.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doc = Document::with('requirements')->find($id);
        return View::make('documents.edit', compact('doc'));
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

		$doc = Document::find($id);
		$doc->update(Input::all());
		$doc->requirements()->sync(Input::get('requirement_id'));

		return Redirect::route('documents.index')->with('suc', 'Document Type Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Document::find($id)->delete();
		return Redirect::back()->with('suc', 'Document Type Deleted.');
	}

}
