<x-layout>
    <x-card>
        <div class="Detail">
            <div class="main">
                <div class="detail-img">
                    <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                        alt="new-image-holder">
                </div>
                <div class="detail-info ">
                    <h3>
                        <span>{{$new['news_header']}}</span>
                    </h3>
                    <p><strong style="color:red; font-size:18px;">{{$new->price . $new->price_unit}}</strong></p>
                    <hr color="#000" size="1" width="100%">
                    <p><strong>Diện tích: </strong>{{$new->area}} {{$new->area_unit}}</p>
                    @if(isset($new->num_wc_rooms))
                    <p><strong>Số phòng vệ sinh: </strong>{{$new->num_wc_rooms}}</p>
                    @endif

                    @if(isset($new->num_wc_rooms))
                    <p><strong>Số phòng ngủ: </strong>{{$new->num_bed_rooms}}</p>
                    @endif

                    <p><strong>Địa chỉ: </strong>{{$new->province->full_name}} . {{$new->district->full_name}}.
                        {{$new->ward->full_name}}</p>

                    <hr color="#000" size="1" width="100%">
                    <p><strong>Mã tin: </strong>{{$new->id}}</p>
                    <p><strong>Ngày đăng: </strong> {{now()->diffInMinutes($new->updated_at)}} phút trước </p>
                    <hr color="#000" size="1" width="100%">
                    <div class="warning">
                        <a><i class="fa fa-share-alt" aria-hidden="true"></i> Chia sẻ</a>
                        <a><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Báo xấu</a>
                        <a><i class="fa fa-heart-o" aria-hidden="true"></i> Lưu tin</a>
                    </div>
                </div>

                <div class="user-contact">
                    <div class="detail-user">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <p>Người đăng: {{$new->user->name}}</p>
                    </div>
                    <button>{{$new->user->email}}</button>
                    <button>{{$new->user->phonenumber}}</button>
                    <div class="fast-contact">
                        <a href=""> <i class="fa fa-paper-plane" aria-hidden="true"></i> trả giá</a>
                        <a href=""> <i class="fa fa-paper-plane" aria-hidden="true"></i> liên hệ</a>
                    </div>
                    <p>Hãy gửi yêu cầu tư vấn. Tôi sẽ liên hệ trả lời bạn trong vòng 60 phút.</p>
                </div>
            </div>
        </div>

        <div class="Detail">
            <div style="padding: 10px">
                <h3>
                    <span>NỘI DUNG TIN ĐĂNG</span>
                </h3>
                {!!$new['description']!!}
            </div>
        </div>

        <div class="top-news">
            <div style="padding: 10px">
                <h3>
                    <span>TIN CÙNG NGƯỜI ĐĂNG</span>
                </h3>
                <x-news.list-ahead-news :news="$usrNew" />
            </div>
        </div>
        <div class="top-news">
            <div style="padding: 10px">
                <h3>
                    <span>TIN ĐĂNG CÙNG PHÂN KHÚC</span>
                </h3>
                <x-news.list-ahead-news :news="$catNew" />
            </div>
        </div>
    </x-card>
</x-layout>