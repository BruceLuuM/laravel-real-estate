<x-admin-layout>
    <div class="user_post_container">
        <form action="{{Route('adminUpdateProject',['project'=>$project->id]);}}" method="POST"
            enctype="multipart/form-data" style="padding: 10px">
            @csrf
            @method('PUT')
            <h3>Update Project ID: {{$project->id}}</h3>
            <h3>Thông tin cơ bản</h3>
            <div class="base">
                <label for="invester_id">Chủ đầu tư</label>
                <select name="invester_id">
                    <option value="" disabled selected>Chọn Chủ đầu tư</option>
                    @foreach($investers as $invester)
                    <option value="{{$invester->id}}" {{($project->invester->id==$invester->id) ?
                        'selected':''}}>{{$invester->name}}</option>
                    @endforeach
                </select>
                <p></p>
                @error('category_id')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="base">
                <label for="category_id">Danh mục</label>
                <select name="category_id">
                    <option value="0" disabled selected>Chọn danh mục</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{($project->category_id == $category->id) ?
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
                    <input placeholder="..." type="text" name="area" value="{{$project->area}}">
                    @error('area')
                    <p class="error">{{$message}}</p>
                    @enderror
                    <select name="area_unit">
                        <option value="0" disabled selected>Đơn vị</option>
                        <option value="m2" @if ($project->area_unit == 'm2') {{'selected'}} @endif>m2
                        </option>
                        <option value="ha" @if ($project->area_unit == 'ha') {{'selected'}} @endif>ha
                        </option>

                    </select>
                    @error('area_unit')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div style="display: flex">
                <div class="base_options">
                    <label for="province_id">Tỉnh/Thành phố</label>
                    <select name="province_id">
                        <option value="0" disabled selected>Thành phố</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->code}}" {{($project->province_id == $province->code)
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
                        <option value="{{$distric->code}}" {{($project->district_id == $distric->code) ?
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
                        <option value="{{$ward->code}}" {{($project->ward_id == $ward->code)
                            ?'selected':''}}>{{$ward->name}}</option>
                        @endforeach
                    </select>
                    @error('ward_id')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="post_page">
                <h3>Nội dung chính của dự án:</h3>
                <div class="base_container">
                    <div class="base">
                        <label for="name">Tên dự án:</label>
                        <input placeholder="..." type="text" name="name" value="{{$project->name}}">
                        @error('name')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="base">
                        <label for="description">Chi tiết dự án:</label>
                        <textarea name="description" id="editorAdmin">{{$project->description}}</textarea>
                        @error('description')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="post_page">
                <h3>Thông tin thêm về dự án:</h3>
                <div class="base_container">
                    <div class="base">
                        <label for="images">Hình ảnh</label>
                        <input name="images" type="file" id='img'>
                        @error('images')
                        <p class="error">{{$message}}</p>
                        @enderror
                        <img src="{{$project->images ? asset('storage/'. $project->images) : asset('/images/no_image.jpg')}}"
                            alt="">
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