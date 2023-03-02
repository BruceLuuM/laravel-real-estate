@extends('adminLTE.layout.master')
@section('title','Admin modulefunction Management')
@section('ModuleFunctionsManagement','active')

@section('page-level-style')
<style type="text/css">
    fieldset {
        margin-bottom: 10px;
    }

    p#innerPara {
        padding: 20px;
    }

    legend {
        font-size: 15px;
        color: #6c757d;
        width: 200px;
        padding: 10px 20px;
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>EDIT Module Function</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Module Function</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="{{route('adminUpdateModuleFunction',['modulefunction'=>$modulefunction->id])}}" method="post"
            id="ModuleFunctionCreateForm" class="col-md-12">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editing Module Function ID: {{$modulefunction->id}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <fieldset class="border rounded">
                                <legend class="text-center">Main information</legend>
                                <div class="col-0 d-flex">
                                    <div class="form-group col-6">
                                        <label for="function_name">Module Function Name</label>
                                        <input type="text" name="function_name" class="form-control"
                                            id="ModuleFunctionName" placeholder="Enter function name"
                                            value="{{$modulefunction->function_name}}">
                                        @error('function_name')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="function_route">Module Function Route</label>
                                        <input type="text" name="function_route" class="form-control"
                                            id="ModuleFunctionRoute" placeholder="Enter function route"
                                            value="{{$modulefunction->function_route}}">
                                        @error('function_route')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="border rounded">
                                <legend class="text-center">Placement</legend>
                                <div class="col-0 d-flex">
                                    <div class="form-group col-6">
                                        <label for="function_folder">Module Function Folder</label>
                                        <input type="text" name="function_folder" class="form-control"
                                            id="ModuleFunctionFolder" placeholder="Enter function folder"
                                            value="{{$modulefunction->function_folder}}">
                                        @error('function_folder')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="function_file">Module Function File</label>
                                        <input type="text" name="function_file" class="form-control"
                                            id="ModuleFunctionFile" placeholder="Enter function file"
                                            value="{{$modulefunction->function_file}}">
                                        @error('function_file')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset class="border rounded">
                                <legend class="text-center">Others</legend>
                                <div class="col-0 d-flex">
                                    <div class="form-group col-6">
                                        <label for="function_css">Module Function css</label>
                                        <input type="text" name="function_css" class="form-control"
                                            id="ModuleFunctionCSS" placeholder="Enter function name"
                                            value="{{$modulefunction->function_css}}">
                                        @error('function_css')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="function_position">Module Function position</label>
                                        <input type="text" name="function_position" class="form-control"
                                            id="ModuleFunctionPosition" placeholder="Enter function position"
                                            value="{{$modulefunction->function_position}}">
                                        @error('function_position')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label for="description">Function description</label>
                                <textarea rows="4" type="text" name="description" class="form-control" id="FunctionName"
                                    placeholder="Enter function's description">{{$modulefunction->description}}</textarea>
                                @error('function_route')
                                <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div>

                            <div class="form-group d-flex">
                                <label for="active" class="p-0 mr-1 mb-0">Active? </label>
                                <input type="hidden" name="active" value="0" />
                                <input type="checkbox" name="active" checked value="1">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                    <button type="commit" class="btn btn-success float-right">Edit</button>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection

<!-- Page specific script -->
@push('script_function_validate')
@endpush

@push('select2')
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
@endpush