<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserInvited;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

	public function index()
	{
		$users = User::all();
		return view('backend.users.index', compact('users'));
	}

	public function edit()
	{
		return;

	}

}
