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
                <h1>Category Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminStoreCategory')}}" method="post">
        @csrf
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add a new category</h3>
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
                                <option value="" disabled>Select one</option>
                                <option value="Bán" @if (old('purpose')=='Bán' ) {{'selected'}} @endif>Bán
                                </option>
                                <option value="Cho thuê" @if (old('purpose')=='Cho thuê' ) {{'selected'}} @endif>Cho
                                    thuê
                                </option>
                            </select>
                            @error('purpose')
                            <p class="error"> {{$message}} </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Decription</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Add Category description here">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control custom-select">
                                <option value="" disabled>Select one</option>
                                <option value="Nhà" @if (old('type')=='Nhà' ) {{'selected'}} @endif> Nhà
                                </option>
                                <option value="Đất" @if (old('type')=='Đất' ) {{'selected'}} @endif> Đất
                                </option>
                                <option value="Căn hộ chung cư" @if (old('type')=='Căn hộ chung cư' ) {{'selected'}}
                                    @endif>Căn hộ
                                    chung cư
                                </option>
                                <option value="Văn phòng" @if (old('type')=='Văn phòng' ) {{'selected'}} @endif>Văn
                                    phòng
                                </option>
                                <option value="Biệt thự" @if (old('type')=='Biệt thự ' ) {{'selected'}} @endif>Biệt thự
                                </option>
                                <option value="BĐS thương mại" @if (old('type')=='BĐS thương mại' ) {{'selected'}}
                                    @endif> BĐS thương
                                    mại
                                </option>
                                <option value="BĐS dịch vụ" @if (old('type')=='BĐS thương mại' ) {{'selected'}} @endif>
                                    BĐS dịch vụ
                                </option>
                                <option value="BĐS nông nghiệp" @if (old('type')=='BĐS nông nghiệp' ) {{'selected'}}
                                    @endif>BĐS nông
                                    nghiệp
                                </option>
                                <option value="BĐS công nghiệp" @if (old('type')=='BĐS công nghiệp ' ) {{'selected'}}
                                    @endif>BĐS
                                    công nghiệp
                                </option>
                                <option value="BĐS tâm linh" @if (old('type')=='BĐS tâm linh' ) {{'selected'}} @endif>
                                    BĐS tâm linh
                                </option>
                                <option value="BĐS khác" @if (old('type')=='BĐS khác' ) {{'selected'}} @endif>BĐS khác
                                </option>
                            </select>
                        </div>
                        @error('type')
                        <p class="error"> {{$message}} </p>
                        @enderror

                        <div class="form-group">
                            <label for="type_name">Type name</label>
                            <input type="text" name="type_name" class="form-control" value="{{old('type_name')}}">
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
                <button type="commit" class="btn btn-success float-right">Create</button>
            </div>
        </div>
    </form>
</section>
@endsection