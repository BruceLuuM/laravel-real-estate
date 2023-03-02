<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminManageAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_LTE()
    {
        return view('adminLTE.manage_admins.manage', [
            'admins' => Admin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminLTE.manage_admins.create', [
            // 'module' => Module::select(['id', 'module_name', 'module_function_id'])->get(),
            'modules' => Module::all(),
            // 'module_function_id',
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('users', 'phonenumber')],
            'password' => ['required', 'min:6'],
            'roles' => ['nullable'],
        ]);
        $formFields['roles'] = implode(" ", $request->role_function_id);
        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //Create admin
        Admin::create($formFields);
        return redirect()->route('adminManageAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('adminLTE.manage_admins.show', [
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('adminLTE.manage_admins.edit', [
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phonenumber' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', Rule::unique('users', 'phonenumber')],
            'password' => ['required', 'min:6'],
            'roles' => ['nullable'],
        ]);

        if ($request->password == null) {
            $formFields['password'] = $request->oldPassword;
        } else {
            $formFields['password'] = bcrypt($formFields['password']);
        }

        $admin->update($formFields);
        $admin->touch();
        return redirect()->route('adminManageAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('adminManageAdmin');
    }
}
