<x-layout>
    <x-card>
        <x-categories.side-categories-investers-bar :categories="$categories" :investers="$investers" />

        <div class="info">
            <div class="inLogo_container">
                <img src="https://staticfile.batdongsan.com.vn/images/avatar/enterprise-banner-default_web.png"
                    alt="invester-banner">

                <div class="inLogo_img">
                    <img src="{{$invester->invester_logo ? asset('storage/'. $invester->invester_logo) : asset('/images/no_image.jpg')}}"
                        alt="invester-logo-placeholder">
                </div>
                <div class="inLogo_name">
                    <div class="inName">
                        <strong> {{$invester->name}} </strong>
                        <p>........Đánh giá</p>
                    </div>
                    <div class="inNumsPro">
                        <a href=""><strong> {{$invester->nums_project}} </strong></a>
                        <a href="">Dự án</a>
                    </div>
                </div>
            </div>
            <div class="inLogo_container">
                <h3>
                    <span>THÔNG TIN CHỦ ĐẦU TƯ</span>
                </h3>
                <strong> {{$invester->brief}}</strong>
                <hr color="#000" size="1" width="100%">
                {!! $invester->description !!}
            </div>
            <div class="inLogo_container">
                <h3>
                    <span>DỰ ÁN THUỘC CHỦ ĐẦU TƯ</span>
                </h3>
                <x-projects.list-ahead-projects :projects="$projects" />
            </div>
            <div class="inLogo_container">
                <h3>
                    <span>Đánh giá:</span>
                </h3>
                <x-projects.list-ahead-projects :projects="$projects" />
            </div>
            <div class="inLogo_container">
                <h3>
                    <span>Nội dung đánh giá:</span>
                </h3>
                <x-projects.list-ahead-projects :projects="$projects" />
            </div>
        </div>
    </x-card>
</x-layout>