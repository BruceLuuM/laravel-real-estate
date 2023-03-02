@if(count($news) == 0)
<p>No new found</p>
@else
<div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true , "autoPlay": true }'>
    @foreach($news as $new)
    <div class="gallery-cell">
        <a href="{{route('showNew',['new'=>$new->slug])}}">
            <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                alt="new-image-holders">
            <p><strong>{{$new->news_header}}</strong></p>
        </a>
    </div>
    @endforeach
</div>
@endif