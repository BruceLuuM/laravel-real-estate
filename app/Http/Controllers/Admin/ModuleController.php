<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModuleFunction;

class ModuleController extends Controller
{
    public function index()
    {
        return view('adminLTE.modules.manage', [
            'modules' => Module::all(),
        ]);
    }

    public function show(Module $module)
    {
        return view('adminLTE.modules.show', [
            'module' => $module,
        ]);
    }

    public function create()
    {
        return view('adminLTE.modules.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'module_name' => ['required'],
            'module_route' => ['required'],
            'module_folder' => ['required'],
            'module_file' => ['required'],
            'module_css' => ['nullable'],
            'module_positon' => ['nullable'],
            'module_function_id' => ['nullable'],
            'active' => ['nullable'],
        ]);

        $formFields['module_function_id'] = implode(" ", $request->module_function_id);
        foreach ($request->module_function_id as $function_id) {
            $used_module = ModuleFunction::where('id', '=', $function_id);
            $update_function['used'] = 1;
            $used_module->update($update_function);
            $used_module->touch();
        }
        Module::create($formFields);
        return redirect()->route('adminManageModule');
    }


    public function edit(Module $module)
    {
        $id_arr = explode(' ', $module->module_function_id);
        return view('adminLTE.modules.edit', [
            'module' => $module,
            'id_arrs' => $id_arr,
        ]);
    }

    public function posupdate(Request $request, Module $module)
    {
        $formFields = $request->validate([
            'module_position' => 'nullable',
            'active' => 'nullable',
        ]);
        $module->update($formFields);
        $module->touch();
        return redirect()->route('adminManageModule');
    }

    public function update(Request $request, Module $module)
    {
        $formFields = $request->validate([
            'module_name' => ['required'],
            'module_route' => ['required'],
            'module_folder' => ['required'],
            'module_file' => ['required'],
            'module_css' => ['nullable'],
            'module_positon' => ['nullable'],
            'module_function_id' => ['nullable'],
            'active' => ['nullable'],
        ]);

        $formFields['module_function_id'] = implode(" ", $request->module_function_id);

        foreach ($request->module_function_id as $function_id) {
            $used_module = ModuleFunction::where('id', '=', $function_id);
            $update_function['used'] = 1;
            $used_module->update($update_function);
            $used_module->touch();
        }

        $module->update($formFields);
        $module->touch();
        return redirect()->route('adminManageModule');
    }

    public function destroy(Module $module)
    {
        $function_id_arrays = explode(' ', $module->module_function_id);

        foreach ($function_id_arrays as $function_id_array) {
            $used_module = ModuleFunction::where('id', '=', $function_id_array);
            $update_function['used'] = 0;
            $update_function['active'] = 0;
            $used_module->update($update_function);
            $used_module->touch();
        }
        $module->delete();
        return redirect()->route('adminManageModule');
    }
}
