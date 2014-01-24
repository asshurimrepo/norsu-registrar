<?php

class UsersController extends BaseController {

	public function __construct($value='')
	{
		Session::put('active', 'user');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('accessLevel')->excludeSelf()->get();
        return View::make('users.index', compact('users','levels'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create', compact('levels'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), User::$rules);
		if($v->fails()) return Redirect::back()->withErrors($v)->withInput();

		$inputs = Input::except(['level_id', 'DataTables_Table_0_length']);
		$inputs['password'] = Hash::make($inputs['password']);
		$user = User::create($inputs);

		if(Input::has('level_id'))
		$user->accessLevel()->sync(Input::get('level_id'));

		return Redirect::route('users.index')->with('suc', 'New User Successfully Added.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = Input::except(['level_id', 'DataTables_Table_0_length']);
		$user = User::find($id);

		// If has password change password
		if(Input::get('password'))
			$inputs['password'] = Hash::make($inputs['password']);
		else
			$inputs['password'] = $user->password;

		$inputs['suspended'] = Input::get('suspended', 0);
		$inputs['is_admin'] = Input::get('is_admin', 0);

		$v = Validator::make($inputs, User::$rules);
		if($v->fails()) return Redirect::back()->withErrors($v);

		$user->update($inputs);

		if(Input::has('level_id'))
		$user->accessLevel()->sync(Input::get('level_id'));

		return Redirect::back()->with('suc', 'User Information Successfully Updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return Redirect::back()->with('suc', 'User has been removed.');
	}

}
