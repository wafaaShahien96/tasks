<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest:admin->except('logout');
    // }

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //attempt login.
        if (Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            //Authenticated, redirect to the intended route
            //if available else admin dashboard.
            return redirect()
                ->intended(route('admin.home'))
                ->with('status', 'You are Logged in as Admin!');
        }


        //Authentication failed, redirect back with input.
        return $this->loginFailed();
    }

    public function logout()
    {
        
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status', 'Admin has been logged out!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }


    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }
}