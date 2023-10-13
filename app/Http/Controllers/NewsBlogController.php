<?php

namespace App\Http\Controllers;

use App\Models\news_blog;
use Illuminate\Http\Request;

class NewsBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index', [
            'news_blogs' => news_blog::latest()->paginate(10),
            'investers' => \App\Models\Invester::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news_blog  $news_blog
     * @return \Illuminate\Http\Response
     */
    public function show(news_blog $news_blog)
    {
        return view('blog.show', [
            'news_blog' => $news_blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news_blog  $news_blog
     * @return \Illuminate\Http\Response
     */
    public function edit(news_blog $news_blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news_blog  $news_blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news_blog $news_blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news_blog  $news_blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(news_blog $news_blog)
    {
        //
    }
}
