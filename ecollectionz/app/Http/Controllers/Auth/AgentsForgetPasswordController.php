<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class AgentsForgetPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agents', ['except' => ['logout']]);
    }

    protected function agent(){
        return Password::agent('agents');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-agent');
    }
}
