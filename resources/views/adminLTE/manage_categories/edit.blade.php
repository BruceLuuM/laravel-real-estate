@extends('adminLTE.layout.master')
@section('title','Admin Category Management')
@section('CategoriesManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminUpdateCategory',['category'=>$category->id]);}}" method="post">
        @csrf
        @method('PUT')
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editting Category ID: {{$category->id}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <select name="purpose" class="form-control custom-select">
                                <option value="Bán" @if ($category->purpose=='Bán') {{'selected'}} @endif>Bán
                                </option>
                                <option value="Cho thuê" @if ($category->purpose=='Cho thuê') {{'selected'}} @endif>Cho
                                    thuê
                                </option>
                            </select>
                            @error('purpose')
                            <p class="error"> {{$message}} </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="decription">Decription</label>
                            <textarea id="decription" class="form-control" rows="4"
                                placeholder="Add Category description here">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control custom-select">
                                <option value="" disabled>Select one</option>
                                <option value="Nhà" @if ($category->type=='Nhà') {{'selected'}} @endif> Nhà
                                </option>
                                <option value="Đất" @if ($category->type=='Đất') {{'selected'}} @endif> Đất
                                </option>
                                <option value="Căn hộ chung cư" @if ($category->type=='Căn hộ chung cư') {{'selected'}}
                                    @endif>Căn hộ
                                    chung cư
                                </option>
                                <option value="Văn phòng" @if ($category->type=='Văn phòng') {{'selected'}} @endif>Văn
                                    phòng
                                </option>
                                <option value="Biệt thự" @if ($category->type=='Biệt thự ') {{'selected'}} @endif>Biệt
                                    thự
                                </option>
                                <option value="BĐS thương mại" @if ($category->type=='BĐS thương mại') {{'selected'}}
                                    @endif> BĐS thương
                                    mại
                                </option>
                                <option value="BĐS dịch vụ" @if ($category->type=='BĐS thương mại') {{'selected'}}
                                    @endif>BĐS dịch vụ
                                </option>
                                <option value="BĐS nông nghiệp" @if ($category->type=='BĐS nông nghiệp') {{'selected'}}
                                    @endif>BĐS nông
                                    nghiệp
                                </option>
                                <option value="BĐS công nghiệp" @if ($category->type=='BĐS công nghiệp ') {{'selected'}}
                                    @endif>BĐS
                                    công nghiệp
                                </option>
                                <option value="BĐS tâm linh" @if ($category->type=='BĐS tâm linh') {{'selected'}}
                                    @endif>BĐS
                                    tâm linh
                                </option>
                                <option value="BĐS khác" @if ($category->type=='BĐS khác') {{'selected'}} @endif>BĐS
                                    khác
                                </option>
                            </select>
                        </div>
                        @error('type')
                        <p class="error"> {{$message}} </p>
                        @enderror

                        <div class="form-group">
                            <label for="type_name">Type name</label>
                            <input type="text" name="type_name" class="form-control" value="{{$category->type_name}}">
                        </div>
                        @error('type_name')
                        <p class=" error"> {{$message}} </p>
                        @enderror
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('adminManageCategory')}}" class="btn btn-secondary">Cancel</a>
                <button type="commit" class="btn btn-success float-right"> Save changes</button>
            </div>
        </div>
    </form>
</section>
@endsection