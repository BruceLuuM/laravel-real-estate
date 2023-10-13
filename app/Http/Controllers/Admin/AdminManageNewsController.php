<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminManageNewsController extends Controller
{
    public function index()
    {
        return view('admin.manage_news.index', [
            'news' => News::latest()->paginate(5),
        ]);
    }

    public function index_LTE()
    {
        return view('adminLTE.manage_news.manage', [
            'news' => News::latest()->paginate(5),
        ]);
    }

    public function show(News $new)
    {
        return view('adminLTE.manage_news.show', [
            'new' => $new,
        ]);
    }


    //show create form
    public function create()
    {
        return view('adminLTE.manage_news.create', [
            'distr'
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
            'price_unit' => 'nullable',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'required',
            'num_bed_rooms' => 'nullable',
            'num_wc_rooms' => 'nullable',
            'law_related_info' => 'nullable',
        ]);

        if ($request->hasFile('images')) {
            $formFields['images'] = $request->file('images')->storeAs('news_images', 'admin-user' . $new->user_id . '-' . time() . '.jpg', 'public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['slug'] = Str::slug($request->news_header);
        News::create($formFields);

        return redirect()->route('adminManageNew');
    }

    // show edit form
    public function edit(News $new)
    {
        return view('adminLTE.manage_news.edit', [
            'new' => $new,
        ]);
    }

    //update form
    public function update(Request $request, News $new)
    {
        $formFields = $request->validate([
            'category_id' => 'required',
            'ward_id' => 'required',
            'district_id' => 'required',
            'province_id' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'price' => 'required',
            'price_unit' => 'nullable',
            'news_header' => 'required',
            'description' => 'required',
            'attribute' => 'required',
            'num_bed_rooms' => 'nullable',
            'num_wc_rooms' => 'nullable',
            'law_related_info' => 'nullable',
        ]);

        if ($request->hasFile('images')) {
            if (Storage::disk('public')->exists($new->images)) {
                Storage::disk('public')->delete($new->images);
            }
            // unlink('storage/' . $new->images);
            $formFields['images'] = $request->file('images')->storeAs('news_images', 'admin-user' . $new->user_id . '-' . time() . '.jpg', 'public');
        }
        $formFields['slug'] = Str::slug($request->news_header);

        $new->update($formFields);
        $new->touch();
        return redirect()->route('adminManageNew');
    }

    //delete ~ destroy
    public function destroy(News $new)
    {
        if (Storage::disk('public')->exists($new->images)) {
            Storage::disk('public')->delete($new->images);
        }
        // unlink('storage/' . $new->images);
        $new->delete();
        return redirect()->route('adminManageNew');
    }
}
