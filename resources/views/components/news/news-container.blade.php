<div class="news_info">
    <a href="{{Route('showNew',['new'=>$new->slug])}}">
        <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}" alt="">
    </a>
    <div class="news_des">
        <a href="{{Route('showNew',['new'=>$new->slug])}}">
            <p>{{$new->news_header}}</p>
        </a>
        <div class="core_info">
            <p> <strong style="color:red">{{$new->price}} {{$new->price_unit}}</strong></p>
            <p> {{$new->area}} {{$new->area_unit}} </p>
            <p> {{$new->id_category}}</p>
        </div>
        <div
            style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical;">
            <p>{{$new->description}}</p>
        </div>
        <div class="user">
            <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> </p>
            <p>{{$new->user->name}} </p>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> </p>
            <p>{{now()->diffInMinutes($new->updated_at)}} phút trước</p>
            <p><i class="fa fa-heart-o" aria-hidden="true"></i> </p>
            <p>Lưu tin</p>
        </div>
    </div>
</div>