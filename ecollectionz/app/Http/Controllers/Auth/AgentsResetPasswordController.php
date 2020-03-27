<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class AgentsResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/agents';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agents');
    }

    protected function guard(){
        return Auth::guard('agents');
    }

    protected function agent(){
        return Password::agent('agents');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-agent')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}

