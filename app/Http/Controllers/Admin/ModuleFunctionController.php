<?php

namespace App\Http\Controllers\Admin;

use App\Models\ModuleFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'function_name' => ['required'],
            'function_folder' => ['required'],
            'function_file' => ['required'],
            'function_css' => ['nullable'],
            'function_postion' => ['nullable'],
            'function_route' => ['required'],
            'description' => ['required'],
            'active' => ['required'],
        ]);

        $formFields['used'] = 0;
        try {
            ModuleFunction::create($formFields);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModuleFunction  $moduleFunction
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleFunction $modulefunction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuleFunction  $moduleFunction
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleFunction $modulefunction)
    {
        return view('adminLTE.modules.editFunction', [
            'modulefunction' => $modulefunction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuleFunction  $moduleFunction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleFunction $modulefunction)
    {
        $formFields = $request->validate([
            'function_name' => ['required'],
            'function_folder' => ['required'],
            'function_file' => ['required'],
            'function_css' => ['nullable'],
            'function_postion' => ['nullable'],
            'function_route' => ['required'],
            'description' => ['required'],
            'active' => ['required'],
        ]);

        $modulefunction->update($formFields);
        $modulefunction->touch();

        return back();
    }

    public function posupdate(Request $request, ModuleFunction $modulefunction)
    {
        $formFields = $request->validate([
            'function_postion' => 'nullable',
            'active' => 'nullable',
        ]);
        $modulefunction->update($formFields);
        $modulefunction->touch();
        return redirect()->route('adminManageModule');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuleFunction  $moduleFunction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleFunction $modulefunction)
    {
        $modulefunction->delete();
        return redirect()->route('adminManageModule');
    }
}
