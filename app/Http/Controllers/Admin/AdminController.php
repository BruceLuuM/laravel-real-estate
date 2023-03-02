<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
        // views via resource/views/listing/index.blade.php
        // about paginate(#num): is divide news list into page while each page contain #num of elements
    }
    public function index_LTE()
    {
        return view('adminLTE.dashbroad');
        // views via resource/views/listing/index.blade.php
        // about paginate(#num): is divide news list into page while each page contain #num of elements
    }

    // Login
    public function adminlogin()
    {
        return view('adminLTE.adminlogin');
    }

    //authenticate form
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($formFields)) {
            return redirect()->route('adminPage');
        } else {
            return redirect()->route('adminlogin');
        }

        return back()->withErrors(['phonenumber' => 'Thông tin tài khoản không hợp lệ!!'])->onlyInput('phonenumber');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
