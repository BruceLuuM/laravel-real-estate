<div class="sidebar">
    <div class="sidebar_e">
        <ul class="list_sidebar">
            <h3>
                <span>TOP 10 PHÂN KHÚC TIÊU BIỂU</span>
            </h3>
            @if(count($categories) == 0)
            <p>No category found</p>
            @else
            @foreach($categories as $category)
            <li><a href="">{{$category['type']}}</a></li>
            @endforeach
            @endif
        </ul>
    </div>
    <div class="sidebar_e_other">
        <ul class="list_sidebar">
            <h3>
                <span>TOP 5 CHỦ ĐẦU TƯ TIÊU BIỂU </span>
            </h3>
            @if(count($investers) == 0)
            <p>No invester found</p>
            @else
            @foreach($investers as $invester)
            <li class="invester_container">
                <a href="{{route('showInvester',['invester'=>$invester->slug])}}" alt="">
                    <img src="{{$invester->invester_logo ? asset('storage/'. $invester->invester_logo) : asset('/images/no_image.jpg')}}"
                        alt="">
                </a>
                <a href="{{route('showInvester',['invester'=>$invester->slug])}}" class="invester_name_container">
                    <strong>{{$invester->name}}</strong>
                    <p>Dự án: {{$invester->nums_project}} </p>
                </a>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>