<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class AgentsLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:agents', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.agents-login');
    }

    public function login(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to log the user in
        if (Auth::guard('agents')
            ->attempt(['email' => $request->email, 'password' => $request->password])) {
            //if ok, redirect to location
            return redirect()->intended(route('agents.dashboard'));
        }
        //else then redirect to login with form data
        return Redirect::back()->with('error', 'Login Error');
    }

    public function logout()
    {
        Auth::guard('agents')->logout();
        return redirect('/agents/login')->with('success', 'Logged Out');
    }
}
