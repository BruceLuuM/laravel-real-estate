<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Invester;
use Illuminate\Http\Request;

class InvesterController extends Controller
{

    public function index()
    {
        // return view('invester.index', [
        //     'invester' => Invester::latest()
        // ]);
    }

    public function show(Invester $invester)
    {
        dd($invester);
        return view('invester.show', [
            'invester' => $invester,
            'categories' => Category::latest()->paginate(10),
            'investers' => Invester::latest()->paginate(5),
            'projects' => Project::latest()
                ->simplePaginate(10)
                ->where('invester_id', '=', $invester->id),
        ]);
    }
}
