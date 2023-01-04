<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminManageUsersController extends Controller
{
    public function index()
    {
        return view('admin.manage_users.index', [
            'users' => User::latest()->filter(request(['search']))->paginate(5),
        ]);
    }


    // create a new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('users', 'phonenumber')],
            'password' => ['required', 'min:6'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
        User::create($formFields);

        return redirect()->route('adminManageUsers');
    }

    //update form
    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'password' => 'required',
        ]);

        $user->update($formFields);
        $user->touch();
        return redirect()->route('adminManageUsers');
    }

    //destroy
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('adminManageUsers');
    }
}
