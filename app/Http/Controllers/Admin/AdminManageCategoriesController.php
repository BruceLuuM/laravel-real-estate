<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminManageCategoriesController extends Controller
{

    public function index()
    {
        return view('admin.manage_categories.index', [
            'categories' => Category::latest()->filter(request(['search']))->paginate(8),

        ]);
    }
    public function index_LTE()
    {
        return view('adminLTE.manage_categories.manage', [
            'categories' => Category::all(),

        ]);
    }

    public function show(Category $category)
    {
        return view('adminLTE.manage_categories.show', [
            'category' => $category,
        ]);
    }

    //show create
    public function create()
    {
        return view('adminLTE.manage_categories.create');
    }

    // create a new category
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'purpose' => ['required'],
            'type' => ['required'],
            'type_name' => ['required'],
            'description' => ['nullable'],
        ]);
        $formFields['slug'] = Str::slug($request->type_name);
        //Create category
        Category::create($formFields);
        return redirect()->route('adminManageCategory');
    }

    //edit form
    public function edit(Category $category)
    {
        return view('adminLTE.manage_categories.edit', [
            'category' => $category,
        ]);
    }

    //update form
    public function update(Request $request, Category $category)
    {
        $formFields = $request->validate([
            'purpose' => ['required'],
            'type' => ['required'],
            'type_name' => ['required'],
        ]);

        $category->update($formFields);
        $category->touch();
        return redirect()->route('adminManageCategory');
    }

    //destroy
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
