<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminManageCategoriesController extends Controller
{

    public function index()
    {
        return view('admin.manage_categories.index', [
            'categories' => Category::latest()->filter(request(['search']))->paginate(8),

        ]);
    }

    // create a new category
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'purpose' => ['required'],
            'type' => ['required'],
            'type_name' => ['required'],
        ]);

        //Create category
        Category::create($formFields);

        return back();
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
        return back();
    }


    //destroy
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
