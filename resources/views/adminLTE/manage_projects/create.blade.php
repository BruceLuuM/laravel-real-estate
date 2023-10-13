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
                    <li class="breadcrumb-item active">Project Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{Route('adminStoreProject')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create a project</h3>
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
                                <option value="{{$invester->id}}" {{(old('invester_id')==$invester->id) ?
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
                                <option value="{{$category->id}}" {{(old('category_id')==$category->id) ?
                                    'selected':''}}>{{$category->type}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="area">Diện tích</label>

                            <input class="form-control" placeholder="..." type="text" name="area"
                                value="{{old('area')}}">
                            @error('area')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <select name="area_unit" class="custom-select">
                                <option value="" disabled selected>Đơn vị</option>
                                <option value="m2" @if (old('area_unit')=='m2' ) {{'selected'}} @endif>m2
                                </option>
                                <option value="ha" @if (old('area_unit')=='ha' ) {{'selected'}} @endif>ha
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
                                    <option value="{{$province->code}}" {{(old('province_id')==$province->
                                        code)? 'selected':''}}>{{$province->full_name}}</option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="district_id" class="custom-select" id="district_id">
                                    <option value="" disabled selected>Quận/Huyện</option>
                                    @if (isset($province_id))
                                    @foreach($districts as $district)
                                    <option value="{{$district->code}}" {{(old('district_id')==$district->
                                        code) ?
                                        'selected':''}}>{{$district->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('district_id')
                                <p class="error">{{$message}}</p>
                                @enderror

                                <select name="ward_id" class="custom-select" id="ward_id">
                                    <option value="" disabled selected>Xã/Phường/Thị trấn</option>
                                    @if (isset($district_id))
                                    @foreach($wards as $ward)
                                    <option value="{{$ward->code}}" {{(old('ward_id')==$ward->code) ?
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
                            <input placeholder="..." type="text" name="name" value="{{old('name')}}"
                                class="form-control">
                            @error('name')
                            <p class="error">{{$message}}</p>
                            @enderror
                            <label for="description">Chi tiết dự án:</label>
                            <textarea name="description" id="summernote">{{old('description')}}</textarea>
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
                                <button type="commit" class="btn btn-success float-right">Create</button>
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

@push('steper_script')
<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
        window.stepper = project Stepper(document.querySelector('.bs-stepper'))
    })

      // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = project Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>

@endpush