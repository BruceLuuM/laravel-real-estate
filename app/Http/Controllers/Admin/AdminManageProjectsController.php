<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wards;
use App\Models\Project;
use App\Models\Invester;
use App\Models\Districts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminManageProjectsController extends Controller
{
    public function index()
    {
        return view('adminLTE.manage_projects.manage', [
            'projects' => Project::latest()->paginate(5),
        ]);
    }

    public function create()
    {
        return view('adminLTE.manage_projects.create', [
            'investers' => Invester::all(),
        ]);
    }

    public function show(Project $project)
    {
        return view('adminLTE.manage_projects.show', [
            'project' => $project,
        ]);
    }

    //store new data
    public function store(Request $request, Project $project)
    {
        $formFields = $request->validate([
            'invester_id' => 'required',
            'category_id' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            'name' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $formFields['images'] = $request->file('images')->storeAs('projects_images', 'admin-invester' . $project->invester_id . '-' . time() . '.jpg', 'public');
        }
        $formFields['slug'] = Str::slug($request->name);

        Project::create($formFields);

        return redirect()->route('adminManageProject');
    }

    // show edit form
    public function edit(Project $project)
    {
        return view('adminLTE.manage_projects.edit', [
            'project' => $project,
            'investers' => Invester::all(),
        ]);
    }

    //update form
    public function update(Request $request, Project $project)
    {
        $formFields = $request->validate([
            'invester_id' => 'required',
            'category_id' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            'name' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'description' => 'required',

        ]);
        if ($request->hasFile('images')) {
            if (Storage::disk('public')->exists($project->images)) {
                Storage::disk('public')->delete($project->images);
                // unlink('storage/' . $project->images);
                $formFields['images'] = $request->file('images')->storeAs('projects_images', 'admin-invester' . $project->invester_id . '-' . time() . '.jpg', 'public');
            } else {
                $formFields['images'] = $request->file('images')->storeAs('projects_images', 'admin-invester' . $project->invester_id . '-' . time() . '.jpg', 'public');
            }
        }
        $formFields['slug'] = Str::slug($request->name);

        $project->update($formFields);
        $project->touch();
        return redirect()->route('adminManageProject');
    }

    //delete ~ destroy
    public function destroy(Project $project)
    {
        if (Storage::disk('public')->exists($project->images)) {
            Storage::disk('public')->delete($project->images);
            // unlink('storage/' . $project->images);
        }
        $project->delete();
        return redirect()->route('adminManageProject');
    }
}
