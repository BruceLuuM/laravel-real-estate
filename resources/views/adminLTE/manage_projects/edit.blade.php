@extends('adminLTE.layout.master')
@section('title','Admin Project Management')
@section('ProjectsManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Project Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Project Editer</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminUpdateProject',['project'=>$project->id]);}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit project ID: {{$project->id}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="post_page">
                            <h3>Thông tin cơ bản</h3>
                            <label for="invester_id">Chủ đầu tư</label>
                            <select name="invester_id" class="custom-select">
                                <option value="" disabled selected>Chọn Chủ đầu tư</option>
                                @foreach($investers as $invester)
                                <option value="{{$invester->id}}" {{($project->invester_id==$invester->id) ?
                                    'selected':''}}>{{$invester->name}}</option>
                                @endforeach
                            </select>
                            <p></p>
                            @error('category_id')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="category_id" id>Danh mục</label>
                            <select name="category_id" class="custom-select">
                                <option value="" disabled selected class="form-control">Chọn danh mục</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{($project->category_id==$category->id) ?
                                    'selected':''}}>{{$category->type}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="area">Diện tích</label>

                            <input class="form-control" placeholder="..." type="text" name="area"
                                value="{{$project->area}}">
                            @error('area')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <select name="area_unit" class="custom-select">
                                <option value="" disabled selected>Đơn vị</option>
                                <option value="m2" @if ($project->area_unit=='m2') {{'selected'}} @endif>m2
                                </option>
                                <option value="ha" @if ($project->area_unit=='ha') {{'selected'}} @endif>ha
                                </option>
                            </select>
                            @error('area_unit')
                            <p class="error">{{$message}}</p>
                            @enderror

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <select name="province_id" onchange="address_adjust()" class="custom-select"
                                    id="province_id">
                                    <option value="" disabled selected>Thành phố</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->code}}" {{($project->province_id==$province->code)?
                                        'selected':''}}>{{$province->full_name}}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="district_id" class="custom-select" id="district_id">
                                    <option value="" disabled selected>Quận/Huyện</option>
                                    @if (isset($districts))
                                    @foreach($districts as $distric)
                                    <option value="{{$distric->code}}" {{($project->district_id==$distric->code) ?
                                        'selected':''}}>{{$distric->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('district_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="ward_id" class="custom-select" id="ward_id">
                                    <option value="0" disabled selected>Xã/Phường/Thị trấn</option>
                                    @if (isset($wards))
                                    @foreach($wards as $ward)
                                    <option value="{{$ward->code}}" {{($project->ward_id==$ward->code) ?
                                        'selected':''}}>{{$ward->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('ward_id')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <h3>Nội dung chính của dự án:</h3>
                        <div class="form-group">
                            <label for="name">Tên dự án:</label>
                            <input placeholder="..." type="text" name="name" value="{{$project->name}}"
                                class="form-control">
                            @error('name')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="description">Chi tiết dự án:</label>
                            <textarea name="description" id="summernote">{{$project->description}}</textarea>
                            @error('description')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <h3>Thông tin thêm về dự án:</h3>
                        <div class="form-group">
                            <label for="images">Hình ảnh: </label>
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
                        </div>
                        <h3>Thao tác</h3>
                        <div class="form-group">
                            <label for="capcha">Mã capcha</label>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{route('adminManageInvester')}}" class="btn btn-secondary">Cancel</a>
                                <button type="commit" class="btn btn-success float-right">Save changes</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div>

    </form>
</section>
@endsection


@push('script_summernote')
<script>
    $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
@endpush