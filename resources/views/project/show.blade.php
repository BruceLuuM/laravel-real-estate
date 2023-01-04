<x-layout>
    <x-card>
        <div class="Detail_container">
            <div class="main_detail">
                <div class="main">
                    <div class="detail-project-img">
                        <img src="{{$project->images ? asset('storage/'. $project->images) : asset('/images/no_image.jpg')}}"
                            alt="">
                    </div>
                    <div class="detail-project-info ">
                        <span>
                            {{$project->name}}
                        </span>
                        <p>
                            {{$project->ward->full_name}}, {{$project->district->full_name}},
                            {{$project->province->full_name}}
                        </p>
                        <hr color="#000" size="1" width="100%">
                        <p><strong>Phân khúc: </strong> {{$project->category->type}}
                        </p>
                        <p><strong>Địa chỉ: </strong>
                            {{$project->ward->full_name}}, {{$project->district->full_name}},
                            {{$project->province->full_name}}
                        </p>
                        <p><strong>Diện tích: </strong>
                            {{$project->area}} {{$project->area_unit}}
                        </p>
                        <p><strong>Chủ đầu tư: </strong>
                            {{$project->invester->name}}
                        </p>
                        <hr color="#000" size="1" width="100%">
                        <div class="warning">
                            <a><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ</a>
                            <a><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo xấu</a>
                            <a><i class="fa fa-heart-o" aria-hidden="true"></i> Lưu tin</a>
                        </div>
                        <span>Chủ đầu tư:</span>
                        <div class="invester_container_project">
                            <a href="{{route('showInvester',['invester'=>$project->invester->slug])}}">
                                <img src="{{$project->invester->invester_logo ? asset('storage/'. $project->invester->invester_logo) : asset('/images/no_image.jpg')}}"
                                    alt="">
                            </a>
                            <a href="{{route('showInvester',['invester'=>$project->invester->slug])}}"
                                class="invester_name_container">
                                <strong>
                                    {{$project->invester->name}}
                                </strong>
                                <p style="opacity: 0.7">Dự án: {{$project->invester->nums_project}}
                                </p>
                                <div
                                    style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical;">
                                    <p>{!! $project->invester->description !!}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="Detail_container">
            <x-categories.side-categories-investers-bar :categories="$categories" :investers="$investers" />
            <div class="Detail_project">
                <h3>
                    <span>NỘI DUNG TIN ĐĂNG</span>
                </h3>
                <p class="Project_description">
                    {!! $project->description !!}
                </p>
            </div>
            <div class="Diff_project">
                <div class="inLogo_container" style="">
                    <h3>
                        <span>DỰ ÁN CÙNG KHU VỰC</span>
                    </h3>
                    <x-projects.list-ahead-projects :projects="$projects" />
                </div>
                <div class="inLogo_container" style="">
                    <h3>
                        <span>ĐÁNH GIÁ</span>
                    </h3>
                    <x-projects.list-ahead-projects :projects="$projects" />
                </div>
                <div class="inLogo_container" style="">
                    <h3>
                        <span>NỘI DUNG ĐÁNH GIÁ</span>
                    </h3>
                    <x-projects.list-ahead-projects :projects="$projects" />
                </div>
            </div>
        </div>
    </x-card>
</x-layout>