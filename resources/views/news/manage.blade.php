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
                                        alt="" style="width:100px; height:100px;"></td>
                                <td style="width:550px">
                                    <div class="news_des" style="padding:0;">
                                        <p style="font-weight:bold; ">{{$new->news_header}}</p>
                                        <div class="core_info">
                                            <p> <strong style="color:red">{{$new->price .
                                                    $new->price_unit}}</strong> </p>
                                            <p> {{$new->area . ' '. $new->area_unit }} </p>
                                        </div>
                                        <div class="text"
                                            style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical;">
                                            <p>{{$new->description}}</p>
                                        </div>
                                        <div class="user">
                                            <p><img src="/images/icon/icons8-clock-50.png" alt=""
                                                    style="width:20px;height:20px;padding-top:3px"></p>
                                            <p style="padding-top:6px">00:00:00</p>

                                            <form action="{{route('userDestroyNews',['new'=>$new->id]);}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return ComfirmDelete();"
                                                    style="border: none;cursor: pointer;">🗑️ Xóa tin</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{Route('userEditNews',['new'=>$new->id]);}}">Cập nhật</a>
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
<script>
    function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tin này không?');
    }

    function validateForm() {

        // var img = document.getElementById('img');
        // if (isFileImage(img.value)) {
        //     img.setCustomValidity('Sai định dạng ảnh!!!');
        // }

        var fname = document.getElementById('news_header');
        if (fname.value == '') {
            fname.setCustomValidity('Bạn cần phải nhập tiêu đề trước !');
        } else {
            fname.setCustomValidity('');
        }

        return true;
    }

    document.getElementsByName('create')[0].onclick = validateForm;
</script>