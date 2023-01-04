<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    // show register / create form 
    public function create()
    {
        return view('users.register');
    }


    // Login
    public function login()
    {
        return view('users.login');
    }

    // create a new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('users', 'phonenumber')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    //authenticate form
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            if (auth()->user()->type == 'admin') {
                return redirect('/admin');
            }
            return redirect('/');
        }

        return back()->withErrors(['phonenumber' => 'Thông tin tài khoản không hợp lệ!!'])->onlyInput('phonenumber');
    }
}
