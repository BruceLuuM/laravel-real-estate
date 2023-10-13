<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invester;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminManageInvestersController extends Controller
{
    public function index()
    {
        return view('admin.manage_investers.index', [
            'investers' => Invester::latest()->paginate(5),
        ]);
    }

    public function index_LTE()
    {
        return view('adminLTE.manage_investers.manage', [
            'investers' => Invester::all(),
        ]);
    }

    public function show(Invester $invester)
    {
        return view('adminLTE.manage_investers.show', [
            'invester' => $invester,
        ]);
    }

    //show create
    public function create()
    {
        return view('adminLTE.manage_investers.create', []);
    }

    // create/store a new invester
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'nums_project' => ['required'],
            'brief' => ['required'],
            'description' => ['required'],
        ]);
        if ($request->hasFile('invester_logo')) {
            $formFields['invester_logo']  = $request->file('invester_logo')->storeAs('invester_logo', 'investerLogo' . '-' . time() . '.jpg', 'public');
        }

        $formFields['slug'] = Str::slug($request->name);
        //Create invester
        Invester::create($formFields);
        return redirect()->route('adminManageInvester');
    }

    //edit form
    public function edit(Invester $invester)
    {
        return view('adminLTE.manage_investers.edit', [
            'invester' => $invester,
        ]);
    }

    //update form
    public function update(Request $request, Invester $invester)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'nums_project' => ['required'],
            'brief' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('invester_logo')) {
            if (Storage::disk('public')->exists($invester->invester_logo)) {
                Storage::disk('public')->delete($invester->invester_logo);
            }
            // unlink('storage/' . $invester->invester_logo);
            $formFields['invester_logo'] = $request->file('invester_logo')->storeAs('invester_logo', 'investerLogo' . '-' . time() . '.jpg', 'public');
        }
        $formFields['slug'] = Str::slug($request->name);

        $invester->update($formFields);
        $invester->touch();
        return redirect()->route('adminManageInvester');
    }

    //destroy
    public function destroy(Invester $invester)
    {
        if (Storage::disk('public')->exists($invester->invester_logo)) {
            Storage::disk('public')->delete($invester->invester_logo);
        }
        // unlink('storage/' . $invester->invester_logo);
        $invester->delete();
        return redirect()->route('adminManageInvester');
    }
}
