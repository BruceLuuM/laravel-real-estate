<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Wards;
use App\Models\Project;
use App\Models\Category;
use App\Models\Invester;
use App\Models\Districts;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    //show all
    public function index()
    {
        return view('news.index', [
            'news' => News::latest()->filter(request(['search']))->paginate(10),
            'categories' => Category::latest()->paginate(10),
            'investers' => Invester::latest()->paginate(5),
            'projects' => Project::latest()->paginate(5),

        ]);
    }

    //show single
    public function show(News $new)
    {
        return view('news.show', [
            'new' => $new,
            'usrNew' => News::latest()->paginate(5)->where('user_id', '=', $new->user_id),
            'catNew' => News::latest()->paginate(5)->where('category_id', '=', $new->category_id),
        ]);
    }

    //show create
    public function create()
    {
        return view('news.create', [
            'districts' => Districts::all(),
            'wards' => Wards::all(),
        ]);
    }

    //store new data
    public function store(Request $request, News $new)
    {
        $formFields = $request->validate([
            'category_id' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            // 'address' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'price' => 'required',
            'price_unit' => 'required',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'required',
            'num_bed_rooms' => 'required',
            'num_wc_rooms' => 'required',
            'law_related_info' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $formFields['images'] = $request->file('images')->storeAs('news_images', 'user' . $new->user_id . '-' . time() . '.jpg', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['slug'] = Str::slug($request->news_header);
        News::create($formFields);

        return redirect('/');
    }

    //edit form
    public function edit(News $new)
    {
        return view('news.edit', [
            'new' => $new,
            'districts' => Districts::all(),
            'wards' => Wards::all(),
        ]);
    }

    //update form
    public function update(Request $request, News $new)
    {
        // mmake sure logged in user is owner
        if ($new->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'category_id' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            // 'address' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'price' => 'required',
            'price_unit' => 'required',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'required',
            'num_bed_rooms' => 'required',
            'num_wc_rooms' => 'required',
            'law_related_info' => 'required',
        ]);

        if ($request->hasFile('images')) {
            if (Storage::disk('public')->exists($new->images)) {
                Storage::disk('public')->delete($new->images);
            }
            $formFields['images'] = $request->file('images')->storeAs('news_images', 'user' . $new->user_id . '-' . time() . '.jpg', 'public');
        }

        $new->update($formFields);
        $formFields['slug'] = Str::slug($request->news_header);

        $new->touch();

        return redirect('/');
    }

    //delete ~ destroy
    public function destroy(News $new)
    {

        // mmake sure logged in user is owner
        if ($new->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        if (Storage::disk('public')->exists($new->images)) {
            Storage::disk('public')->delete($new->images);
        }
        $new->delete();
        return redirect('/');
    }

    public function manage()
    {
        return view('news.manage', ['news' => auth()->user()->news]);
    }

    // public function adminManage()
    // {
    //     return view('admin.manage_news.manage', ['news' => auth()->user()->news]);
    // }
}
