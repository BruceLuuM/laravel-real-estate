<x-layout>
    <x-card>
        {{-- <div class="top-news">
            <div class=top-search>
                <h3>
                    <span>TIN TỨC NỔI BẬT </span>
                </h3>
            </div>
            <x-news.list-ahead-news :news="$news" />
        </div> --}}

        <div>

            <x-categories.side-categories-investers-bar :categories="$categories" :investers="$investers" />

            <div class="info">
                <div class="news_container">
                    <h3>
                        <span>Tin tức</span>
                    </h3>
                    @if(count($news_blogs) == 0)
                    <p>No news found</p>
                    @else
                    @foreach ($news_blogs as $news_blog)
                    {{--
                    <x-blog.blog-container :news_blog="$news_blog" /> --}}
                    <div class="news_info">
                        <a href="{{Route('showBlog',['news_blog'=>$news_blog->slug])}}">
                            <img src="{{$news_blog->images ? asset('storage/'. $news_blog->images) : asset('/images/no_image.jpg')}}"
                                alt="news_blog-image-holder">
                        </a>
                        <div class="news_des">
                            <a href="{{Route('showBlog',['news_blog'=>$news_blog->slug])}}">
                                <p>{{$news_blog->title}}</p>
                            </a>
                            <div class="core_info">
                                <p> {{$news_blog->date}}</p>
                            </div>
                            <div class="description_data_view">
                                <p>{!!$news_blog->text!!}</p>
                                {{-- <p style="font-size:20px">{!!$news_blog->text!!}</p> --}}
                            </div>


                            <div class="user">
                                {{-- <p><i class="fa fa-user-circle-o" aria-hidden="true"> </i>
                                    {{$news_blog->user->name}}
                                </p> --}}
                                <p><i class="fa fa-clock-o" aria-hidden="true"> </i>
                                    {{now()->diffInMinutes($news_blog->updated_at)}} phút trước
                                </p>
                                <p><i class="fa fa-heart-o" aria-hidden="true"> </i> Lưu tin</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <br>
                    <table>
                        {{$news_blogs->links('vendor.pagination.tailwind')}}
                    </table>
                </div>
            </div>
        </div>
        {{--
        <div class="top-news">
            <div class=top-search>
                <h3>
                    <span>DỰ ÁN NỔI BẬT </span>
                </h3>
            </div>
            <x-projects.list-ahead-projects :projects="$projects" />
        </div> --}}


    </x-card>
</x-layout>