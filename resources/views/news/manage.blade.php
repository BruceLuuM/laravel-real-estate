<x-layout>
    <x-card>
        <div class="container">
            <div class="form">
                <x-news.user-sidebar-container />
                <div class="user_post_container">
                    <div class="post_page">
                        <div style="display: flex; justify-content:space-between;">
                            <h3>
                                <span>Tin đã đăng</span>
                            </h3>
                            <a href="{{Route('userCreateNews')}}"
                                style="cursor: pointer; border: 2px solid #000; border-radius: 7px; padding:5px; color:#000">
                                + Đăng tin</a>
                        </div>
                        <table id="posted_news">
                            @unless($news->isEmpty())
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($news as $index => $new)
                            <tr>
                                <td style="width:50px;">{{$index+1}}</td>
                                <td style="width:105px; height: 105px;"><img
                                        src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                                        alt="new-image-holder" style="width:100px; height:100px;"></td>
                                <td style="width:550px">
                                    <div class="news_des" style="padding:0;">
                                        <p style="font-weight:bold; ">{{$new->news_header}}</p>
                                        <div class="core_info">
                                            <p> <strong style="color:red">{{$new->price .
                                                    $new->price_unit}}</strong> </p>
                                            <p> {{$new->area . ' '. $new->area_unit }} </p>
                                        </div>
                                        <div class="description_data_view">
                                            <p>{{$new->description}}</p>
                                        </div>
                                        <div class="user">
                                            <p><i class="fa fa-clock-o" aria-hidden="true"> </i>
                                                {{now()->diffInMinutes($new->updated_at)}} phút trước
                                            </p>
                                            <form action="{{route('userDestroyNews',['new'=>$new->id]);}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return ComfirmDelete();"
                                                    style="border: none;cursor: pointer; color:red"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Xóa tin</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{Route('userEditNews',['new'=>$new->id]);}}"><i class="fa fa-wrench"
                                            aria-hidden="true"></i>
                                        Cập nhật</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>no news found</p>
                            @endunless
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>

<script type="text/javascript" src="{{ asset('js/confirm-delete.js') }}"></script>