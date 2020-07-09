<?php

namespace App\Http\Controllers\Auth;

use App\Activation;
use App\Http\Requests\ActivateUserRequest;
use App\Http\Controllers\Controller;
use App\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ActivationController extends Controller
{


    /**
     * Where to redirect users after activation.
     *
     * @var string
     */
    protected $redirectTo = '/admin';


    public function showActivationForm($token, $email)
    {
        $activation = new Activation();

        if ($activation->findByEmail($email)->isValid($token))
        {
            return view('backend.activations.activate')->with(
                ['token' => $token, 'email' => $email]
            );
        }
        else
        {
            return view('backend.activations.failed')
                ->with('error', 'Sorry, your activation token is not valid. Please request a new token');
        }
    }

    /**
     * @param ActivateUserRequest $request
     */
    public function activate(ActivateUserRequest  $request)
    {
        $user = $request->activation->user();
        $user->password = Hash::make($request->password);
        $user->status = UserStatus::ACTIVE;
        $user->save();

        Auth::login($user);

        session()->flash('success', 'Congratulations, your account has been activated');

        return redirect($this->redirectTo);

    }


}
