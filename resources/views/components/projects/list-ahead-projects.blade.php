@if(count($projects) == 0)
<p>No project found</p>
@else
<div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "autoPlay": true }'>
    @foreach($projects as $project)
    <div class="gallery-cell">
        <a href="{{route('showProject', ['project'=>$project->slug])}}">
            <img src="{{$project->images ? asset('storage/'. $project->images) : asset('/images/no_image.jpg')}}"
                alt="new-image-holder">
            <p><strong>{{$project->name}}</strong></p>
        </a>
    </div>
    @endforeach
</div>
@endif