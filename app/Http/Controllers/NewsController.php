<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;
use App\Models\Category;
use App\Models\Invester;

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
        return view('news.create');
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
            'price_unit' => 'nullable',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'nullable',
            'num_bed_rooms' => 'nullable',
            'num_wc_rooms' => 'nullable',
            'law_related_info' => 'nullable',
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
            'new' => $new
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
            'area_unit' => 'nullable',
            'price' => 'required',
            'price_unit' => 'required',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'nullable',
            'num_bed_rooms' => 'nullable',
            'num_wc_rooms' => 'nullable',
            'law_related_info' => 'nullable',
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
        // make sure logged in user is owner
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

    public function search_news(Request $request)
    {
        //new_stuff
        $news = News::filter($request->only(['news_header', 'category_id', 'province_id', 'district_id', 'ward_id']))->paginate(10);
        $categories = Category::latest()->paginate(10);
        $investers = Invester::latest()->paginate(5);
        return view('search_view.index', compact('news', 'categories', 'investers'));
    }
}
