@extends('adminLTE.layout.master')
@section('title','Admin Invester Management')
@section('InvestersManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Invester Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Invester Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminUpdateInvester',['invester'=>$invester->id]);}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editting Invester ID: {{$invester->id}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Invester name:</label>
                            <input type="text" name="name" class="form-control" value="{{$invester->name}}">
                            @error('name')
                            <p class=" error"> {{$message}} </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nums_project">Number of present project:</label>
                            <input placeholder="..." type="text" name="nums_project" class="form-control"
                                value="{{$invester->nums_project}}">
                            @error('nums_project')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="brief">Invester's brief:</label>
                            <textarea name="brief" class="form-control">{{$invester->brief}}</textarea>
                            @error('brief')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Invester's description:</label>
                            <textarea name="description" id="editorAdmin"
                                class="form-control">{{$invester->description}}</textarea>
                            @error('description')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="invester_logo">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="invester_logo" class="custom-file-input"
                                        id="invester_logo">
                                    <label class="custom-file-label" for="invester_logo">Choose
                                        file</label>
                                </div>

                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                @error('invester_logo')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <img src="{{$invester->invester_logo ? asset('storage/'. $invester->invester_logo) : asset('/images/no_image.jpg')}}"
                                alt="" class="img-circle elevation-2" width="100" height="100">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('adminManageInvester')}}" class="btn btn-secondary">Cancel</a>
                <button type="commit" class="btn btn-success float-right">Save changes</button>
            </div>
        </div>
    </form>
</section>
@endsection