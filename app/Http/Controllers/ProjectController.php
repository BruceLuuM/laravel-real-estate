<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Invester;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // return view('invester.index', [
        //     'invester' => Invester::latest()
        // ]);
    }

    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project,
            'investers' => Invester::latest()->paginate(5),
            'projects_province_related' => Project::latest()
                ->paginate(10)
                ->where('province_id', '=', $project->province_id),
        ]);
    }
}
