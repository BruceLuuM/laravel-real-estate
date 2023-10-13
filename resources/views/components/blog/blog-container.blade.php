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
            {{-- <a href="{{Route('showBlog',['news_blog'=>$news_blog->slug])}}">--> xem thêm</a> --}}
        </div>
        <div class="user">
            <p><i class="fa fa-user-circle-o" aria-hidden="true"> </i> {{$new->user->name}} </p>
            <p><i class="fa fa-clock-o" aria-hidden="true"> </i> {{now()->diffInMinutes($new->updated_at)}} phút trước
            </p>
            <p><i class="fa fa-heart-o" aria-hidden="true"> </i> Lưu tin</p>
        </div>
    </div>
</div>