<div class="news_info">
    <a href="{{Route('showNew',['new'=>$new->slug])}}">
        <img type="image/webp" src=" {{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
            alt="new-image-holder">
    </a>
    <div class="news_des">
        <a href="{{Route('showNew',['new'=>$new->slug])}}">
            <p>{{$new->news_header}}</p>
        </a>
        <div class="core_info">
            <p> <strong style="color:red">
                    @if($new->price_unit)
                    Thỏa thuận
                    @else
                    {{$new->price}} {{$new->price_unit}}
                    @endif
                </strong></p>
            <p> {{$new->area}} {{$new->area_unit}} </p>
            <p> {{$new->id_category}}</p>
        </div>
        <div class="description_data_view">
            {{-- <p>{!!$new->description!!}</p> --}}
            <p>{!!$new->description!!}</p>
        </div>
        <div class="user">
            <p><i class="fa fa-user-circle-o" aria-hidden="true"> </i> {{$new->user->name}} </p>
            <p><i class="fa fa-clock-o" aria-hidden="true"> </i> {{now()->diffInMinutes($new->updated_at)}} phút trước
            </p>
            <p><i class="fa fa-heart-o" aria-hidden="true"> </i> Lưu tin</p>
        </div>
    </div>
</div>