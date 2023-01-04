<x-admin-layout>
    <div class="user_post_container">
        <form action="{{Route('adminUpdateNew',['new'=>$new->id]);}}" method="POST" enctype="multipart/form-data"
            style="padding: 10px">
            @csrf
            @method('PUT')
            <h3>Update New ID: {{$new->id}}</h3>
            <h3>Thông tin cơ bản</h3>
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
            <div style="display: flex">
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
                        <input placeholder="..." type="text" name="price" value="{{$new->price}}">
                        @error('price')
                        <p class="error">{{$message}}</p>
                        @enderror
                        <select name="price_unit">
                            <option value="0" disabled selected>Đơn vị</option>
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
            </div>

            <div style="display: flex">
                <div class="base_options">
                    <label for="province_id">Tỉnh/Thành phố</label>
                    <select name="province_id">
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

                <div class="base_options">
                    <label for="district_id">Quận/Huyện</label>
                    <select name="district_id">
                        <option value="0" disabled selected>Quận/Huyện</option>
                        @foreach($districts as $distric)
                        <option value="{{$distric->code}}" {{($new->district_id == $distric->code) ?
                            'selected':''}}>{{$distric->name}}</option>
                        @endforeach
                    </select>
                    @error('district_id')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base_options">
                    <label for="ward_id">Xã/Phường/Thị trấn</label>
                    <select name="ward_id">
                        <option value="0" disabled selected>Xã</option>
                        @foreach($wards as $ward)
                        <option value="{{$ward->code}}" {{($new->ward_id == $ward->code) ?
                            'selected':''}}>{{$ward->name}}</option>
                        @endforeach
                    </select>
                    @error('ward_id')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="post_page">
                <h3>Nội dung tin đăng bất động sản</h3>
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
                        <textarea name="description" id="editorAdmin">{{$new->description}}</textarea>
                        @error('description')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="post_page">
                <h3>Thông tin bất động sản</h3>
                <div class="base_container">
                    <div class="base">
                        <label for="images">Hình ảnh</label>
                        <input name="images" type="file" id='img'>
                        @error('images')
                        <p class="error">{{$message}}</p>
                        @enderror
                        <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                            alt="">

                    </div>
                    <div style="display: flex">
                        <div class="base">
                            <label for="num_bed_rooms">Số phòng ngủ: </label>
                            <input placeholder="..." type="text" name="num_bed_rooms" value="{{$new->num_bed_rooms}}">
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
                    </div>

                    <div style="display: flex">
                        <div class="base">
                            <label for="attribute">Nội thất</label>
                            <textarea placeholder="..." name="attribute">{{$new->attribute}}</textarea>
                            @error('attribute')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="base">
                            <label for="law_related_info">Pháp lý</label>
                            <textarea placeholder="Đã có sổ đỏ, đã có sổ hồng, đã được phê duyệt, quyết định đầu tư,..."
                                name="law_related_info">{{$new->law_related_info}}</textarea>
                            @error('law_related_info')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="post_page">
                <h3>Thao tác</h3>
                <button
                    style="background-color:#285ea6; border: 2px solid #fff; border-radius:7px; height:50px; width:100px; color: #fff; cursor:pointer">UPDATE</button>
            </div>
        </form>
    </div>
</x-admin-layout>