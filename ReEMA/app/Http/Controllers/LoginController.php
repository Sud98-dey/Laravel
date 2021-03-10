<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function __invoke(){
		return redirect('/LogIn');
	}
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
       return redirect()->intended('/OwnerProfile');
        }

        return back()->withErrors([
            'email' => 'The provided email is not valid.',
            'password' => 'The provided password is not valid.',
        ]);
    }

}
