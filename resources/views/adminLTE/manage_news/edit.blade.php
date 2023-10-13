@extends('adminLTE.layout.master')
@section('title','Admin New Management')
@section('NewsManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminUpdateNew',['new'=>$new->id]);}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editting New ID: {{$new->id}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="post_page">
                            <h3>Thông tin cơ bản</h3>
                            <label for="category_id" id>Danh mục</label>
                            <select name="category_id" class="custom-select">
                                <option value="" disabled selected class="form-control">Chọn danh mục</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if ($new->category_id==$category->id) {{'selected'}}
                                    @endif >{{$category->type}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="area">Diện tích</label>
                            <input class="form-control" placeholder="..." type="text" name="area"
                                value="{{$new->area}}">
                            @error('area')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <select name="area_unit" class="custom-select">
                                <option value="" disabled selected>Đơn vị</option>
                                <option value="m2" @if ($new->area_unit=='m2' ) {{'selected'}} @endif>m2
                                </option>
                                <option value="ha" @if ($new->area_unit=='ha' ) {{'selected'}} @endif>ha
                                </option>
                            </select>
                            @error('area_unit')
                            <p class="error">{{$message}}</p>
                            @enderror

                            <label for="price">Giá</label>
                            <div class="form-group_options">
                                <input class="form-control" placeholder="..." type="text" name="price"
                                    value="{{$new->price}}">
                                @error('price')
                                <p class="error">{{$message}}</p>
                                @enderror
                                <select name="price_unit" class="custom-select">
                                    <option value="" disabled selected>Đơn vị</option>
                                    <option value="tỉ" @if ($new->price_unit=='tỉ' ) {{'selected'}} @endif>tỉ
                                    </option>
                                    <option value="nghìn tỉ" @if ($new->price_unit=='nghìn tỉ' ) {{'selected'}} @endif>
                                        nghìn tỉ
                                    </option>
                                </select>
                                @error('price_unit')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <select name="province_id" onchange="address_adjust()" class="custom-select"
                                    id="province_id">
                                    <option value="" disabled selected>Thành phố</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->code}}" {{($new->province_id==$province->
                                        code)? 'selected':''}}>{{$province->full_name}}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="district_id" class="custom-select" id="district_id">
                                    <option value="" disabled selected>Quận/Huyện</option>
                                    @if (isset($province_id))
                                    @foreach($districts as $distric)
                                    <option value="{{$distric->code}}" {{($new->district_id==$distric->
                                        code) ?
                                        'selected':''}}>{{$distric->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('district_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="ward_id" class="custom-select" id="ward_id">
                                    <option value="0" disabled selected>Xã/Phường/Thị trấn</option>
                                    @if (isset($district_id))
                                    @foreach($wards as $ward)
                                    <option value="{{$ward->code}}" {{($new->ward_id==$ward->code) ?
                                        'selected':''}}>{{$ward->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('ward_id')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <h3>Nội dung tin đăng bất động sản</h3>
                        <div class="form-group">
                            <label for="news_header">Tiêu đề tin đăng</label>
                            <input class="form-control" placeholder="..." type="text" name="news_header"
                                value="{{$new->news_header}}">
                            @error('news_header')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Nội dung tin đăng</label>
                            <textarea class="form-control" name="description"
                                id="editorAdmin">{{$new->description}}</textarea>
                            @error('description')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <h3>Thông tin bất động sản</h3>
                        <div class="form-group">
                            <label for="images">Hình ảnh:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="images">Choose
                                        file</label>
                                    <input type="file" name="images" class="custom-file-input" id="images">
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                @error('images')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <img src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                                class="img-circle elevation-2" width="100" height="100" alt="">
                        </div>
                        <div class="form-group">
                            <label for="num_bed_rooms">Số phòng ngủ: </label>
                            <input class="form-control" placeholder="..." type="text" name="num_bed_rooms"
                                value="{{$new->num_bed_rooms}}">
                            @error('num_bed_rooms')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="num_wc_rooms">Số phòng vệ sinh: </label>
                            <input class="form-control" placeholder="..." type="text" name="num_wc_rooms"
                                value="{{$new->num_wc_rooms}}">
                            @error('num_wc_rooms')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="attribute">Nội thất</label>
                            <textarea class="form-control" placeholder="..."
                                name="attribute">{{$new->attribute}}</textarea>
                            @error('attribute')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="law_related_info">Pháp lý</label>
                            <textarea class="form-control"
                                placeholder="Đã có sổ đỏ, đã có sổ hồng, đã được phê duyệt, quyết định đầu tư,..."
                                name="law_related_info">{{$new->law_related_info}}</textarea>
                            @error('law_related_info')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <h3>Thao tác</h3>
                    <div class="form-group">
                        <label for="capcha">Mã capcha</label>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('adminManageNew')}}" class="btn btn-secondary">Cancel</a>
                            <button type="commit" class="btn btn-success float-right"> Save changes</button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </form>
</section>
@endsection