<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('role:admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::latest()->paginate();
		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$roles = roles();
		$user = new User;
		return view('users.create', compact('roles', 'user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|unique:users',
			'password' => 'required|confirmed',
			'role' => 'required|in:admin,user'
		]);

		$data['password'] = Hash::make($data['password']);
		$data['email_verified_at'] = now();

		User::create($data);

		return to_route('users.index')->withSuccess('Data succcessfully created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		$roles = roles();
		return view('users.edit', compact('user', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|unique:users,email,' . $user->id,
			'password' => $request->password ? 'required|confirmed' : '',
			'role' => 'required|in:admin,user'
		]);

		$data['name'] = $request->name;
		if ($request->password) {
			$data['password'] = Hash::make('password');
		}
		$data['email'] = $request->email;
		$data['role'] = $request->role;

		$user->update($data);

		return to_route('users.index')->withSuccess('Data succcessfully created.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete(User $user)
	{
		$user->delete();
		return to_route('users.index')->withSuccess('Data successfully deleted.');
	}
}
