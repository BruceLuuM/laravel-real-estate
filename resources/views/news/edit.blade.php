<x-layout>
    <x-card>
        <div class="form">
            <x-news.user-sidebar-container />

            <div class="user_post_container">
                <form action="{{route('userUpdateNews',['new'=>$new->id]);}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- laravel's custom @method for stituation like this --}}

                    <div class="post_page">
                        <h3>
                            <span>Đăng tin mua bán nhà đất</span>
                        </h3>
                        <p
                            style="border:2px solid #285ea6; border-radius: 7px ; text-align: center;padding: 10px; margin: 10px 0;">
                            Liên hệ sđt: <a href=""> 0123456789 </a></p>
                    </div>
                    <div class="post_page">
                        <h3>
                            <span>Thông tin cơ bản</span>
                        </h3>
                        <div class="base_container">
                            <div class="base">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id">
                                    <option value="0" disabled selected>Chọn danh mục</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{($new->category_id == $category->id) ?
                                        'selected':''}}>{{$category->type}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="base">
                                <label for="area">Diện tích</label>
                                <div class="base_options">
                                    <input placeholder="..." type="text" name="area" value="{{$new->area}}">
                                    @error('area')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                    <select name="area_unit">
                                        <option value="0" disabled selected>Đơn vị</option>
                                        <option value="m2" @if ($new->area_unit == 'm2') {{'selected'}} @endif>m2
                                        </option>
                                        <option value="ha" @if ($new->area_unit == 'ha') {{'selected'}} @endif>ha
                                        </option>

                                    </select>
                                    @error('area_unit')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="base">
                                <label for="price">Giá</label>
                                <div class="base_options">
                                    <input placeholder="..." type="text" name="price" value="{{$new->price}}"
                                        id="price">
                                    @error('price')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                    <select name="price_unit" id="price_unit">
                                        <option value="0" disabled selected>Đơn vị</option>
                                        <option value="" disabled hidden>Thỏa thuận</option>
                                        <option value="tỉ" @if ($new->price_unit == 'tỉ') {{'selected'}} @endif>tỉ
                                        </option>
                                        <option value="nghìn tỉ" @if ($new->price_unit == 'nghìn tỉ') {{'selected'}}
                                            @endif>nghìn tỉ
                                        </option>
                                    </select>
                                    @error('price_unit')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="base">
                                <label>Địa chỉ</label>
                                <div class="base_options">
                                    <div style="width:100%">
                                        <select name="province_id" id="province_id">
                                            <option value="0" disabled selected>Thành phố</option>
                                            @foreach($provinces as $province)
                                            <option value="{{$province->code}}" {{($new->province_id == $province->code)
                                                ? 'selected':''}}>{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div style="width:100%">
                                        <select name="district_id" id="district_id">
                                            <option value="0" disabled selected>Quận/huyện</option>
                                            @if (isset($districts))
                                            @foreach($districts as $distric)
                                            <option value="{{$distric->code}}" {{($new->district_id == $distric->code) ?
                                                'selected':''}}>{{$distric->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('district_id')
                                        <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div style="width:100%">
                                        <select name="ward_id" id="ward_id">
                                            <option value="0" disabled selected>Xã</option>
                                            @if (isset($districts))
                                            @foreach($wards as $ward)
                                            <option value="{{$ward->code}}" {{($new->ward_id == $ward->code) ?
                                                'selected':''}}>{{$ward->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('ward_id')
                                        <p class="error">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="post_page">
                        <h3>
                            <span>Nội dung tin đăng bất động sản</span>
                        </h3>
                        <div class="base_container">
                            <div class="base">
                                <label for="news_header">Tiêu đề tin đăng</label>
                                <input placeholder="..." type="text" name="news_header" value="{{$new->news_header}}">
                                @error('news_header')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="base">
                                <label for="description">Nội dung tin đăng</label>
                                <textarea name="description" id="editorUser">{{$new->description}}</textarea>
                                @error('description')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="post_page">
                        <h3>
                            <span>Thông tin bất động sản</span>
                        </h3>
                        <div class="base_container">
                            <div class="base">
                                <label for="images">Hình ảnh</label>
                                <input name="images" type="file" id='img'>
                                @error('images')
                                <p class="error">{{$message}}</p>
                                @enderror
                                <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                                    alt="new-image-holder">

                            </div>
                            <div class="base">
                                <label for="num_bed_rooms">Số phòng ngủ: </label>
                                <input placeholder="..." type="text" name="num_bed_rooms"
                                    value="{{$new->num_bed_rooms}}">
                                @error('num_bed_rooms')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="base">
                                <label for="num_wc_rooms">Số phòng vệ sinh: </label>
                                <input placeholder="..." type="text" name="num_wc_rooms" value="{{$new->num_wc_rooms}}">
                                @error('num_wc_rooms')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="law_deco">
                                <div class="base">
                                    <label for="attribute">Nội thất</label>
                                    <textarea placeholder="..." name="attribute">{{$new->attribute}}</textarea>
                                    @error('attribute')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="base">
                                    <label for="law_related_info">Pháp lý</label>
                                    <textarea
                                        placeholder="Đã có sổ đỏ, đã có sổ hồng, đã được phê duyệt, quyết định đầu tư,..."
                                        name="law_related_info">{{$new->law_related_info}}</textarea>
                                    @error('law_related_info')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_page">
                        <h3>
                            <span>Thao tác</span>
                        </h3>
                        <div class="base">
                            <label for="capcha">Mã capcha</label>
                        </div>
                        <button class="post_new_button">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
</x-layout>

<script type="text/javascript">
    // CK editor scripts
    ClassicEditor
    .create(document.querySelector('#editorUser'), {
        ckfinder:{
            openerMethod: 'popup',
            uploadUrl: '{{route('ckeditor.upload.user').'?_token='.csrf_token()}}'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch( error => {
        console.error(error);
    });
</script>