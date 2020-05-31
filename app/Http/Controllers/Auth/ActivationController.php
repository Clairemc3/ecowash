<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\ActivationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{

	public function showActivationForm(Request $request,  $token)
	{
		$email = $request->email;


		$activation = new ActivationRepository();

		if ($activation->valid($email, $token ))
			return view('activations.activate')->with(
				['token' => $token, 'email' => $email]
			);

		return view('activations.failed',
			['errorMessage' => 'Sorry, your activation token is not valid. Please request a new token']);
    }
}
