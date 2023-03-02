@extends('adminLTE.layout.master')
@section('title','Admin Module Management')
@section('ModulesManagement','active')

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
                <h1>Module Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Module Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="{{route('adminStoreModule')}}" method="post" id="ModuleCreateForm" class="col-md-6">
            @csrf
            <div class=" row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add a new module</h3>
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
                                        <label for="module_name">Module Name</label>
                                        <input type="text" name="module_name" class="form-control" id="ModuleName"
                                            placeholder="Enter module name">
                                        @error('module_name')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="module_route">Module Route</label>
                                        <input type="text" name="module_route" class="form-control" id="ModuleRoute"
                                            placeholder="Enter module route">
                                        @error('module_route')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="border rounded">
                                <legend class="text-center">Placement</legend>
                                <div class="col-0 d-flex">
                                    <div class="form-group col-6">
                                        <label for="module_folder">Module Folder</label>
                                        <input type="text" name="module_folder" class="form-control" id="ModuleFolder"
                                            placeholder="Enter module folder">
                                        @error('module_folder')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="module_file">Module File</label>
                                        <input type="text" name="module_file" class="form-control" id="ModuleFile"
                                            placeholder="Enter module file">
                                        @error('module_file')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset class="border rounded">
                                <legend class="text-center">Others</legend>
                                <div class="col-0 d-flex">
                                    <div class="form-group col-6">
                                        <label for="module_css">Module css</label>
                                        <input type="text" name="module_css" class="form-control" id="ModuleCSS"
                                            placeholder="Enter module name">
                                        @error('module_css')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="module_position">Module position</label>
                                        <input type="text" name="module_position" class="form-control"
                                            id="ModulePosition" placeholder="Enter module position">
                                        @error('module_position')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label for="module_function_id">Module Functions</label>
                                <select class="select2" multiple="multiple"
                                    data-placeholder="Select Functions for Module" style="width: 100%;"
                                    name="module_function_id[]" id="ModuleFunctionId">
                                    @foreach($moduleFunctions as $moduleFunction)
                                    <option value="{{$moduleFunction->id}}" @if ($moduleFunction->used==1)
                                        {{'disabled'}} @endif>
                                        {{$moduleFunction->function_name}}
                                        <h4>
                                            -- {{$moduleFunction->description}}
                                        </h4>
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('module_function_id')
                            <p class="text-danger"> {{$message}} </p>
                            @enderror

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
                    <a href="{{route('adminManageModule')}}" class="btn btn-secondary">Cancel</a>
                    <button type="commit" class="btn btn-success float-right">Create</button>
                </div>
            </div>
        </form>
        <form action="{{route('adminStoreModuleFunction')}}" method="post" id="ModuleCreateForm" class="col-md-6">
            @csrf
            <div class="row">
                <div class="col-md">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add a new Function</h3>
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
                                        <label for="function_name">Function Name</label>
                                        <input type="text" name="function_name" class="form-control" id="FuncionName"
                                            placeholder="Enter function name">
                                        @error('function_name')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="function_route">Function route</label>
                                        <input type="text" name="function_route" class="form-control" id="FunctionName"
                                            placeholder="Enter function route">
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
                                        <label for="function_folder">Function Folder</label>
                                        <input type="text" name="function_folder" class="form-control"
                                            id="FunctionFolder" placeholder="Enter function folder">
                                        @error('function_folder')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="function_file">Function File</label>
                                        <input type="text" name="function_file" class="form-control" id="FunctionFile"
                                            placeholder="Enter function file">
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
                                        <label for="function_css">Function css</label>
                                        <input type="text" name="function_css" class="form-control" id="FunctionCSS"
                                            placeholder="Enter function name">
                                        @error('function_css')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="function_position">Function position</label>
                                        <input type="text" name="function_position" class="form-control"
                                            id="FunctionPosition" placeholder="Enter function position">
                                        @error('function_position')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label for="description">Function description</label>
                                <textarea rows="4" type="text" name="description" class="form-control" id="FunctionName"
                                    placeholder="Enter function's description"></textarea>
                                <button class="btn btn-success float-right">+Function</button>
                                @error('function_route')
                                <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div>


                            <div class="form-group d-flex">
                                <label for="active" class="p-0 mr-1 mb-0">Active?</label>
                                <input type="hidden" name="active" value="0" />
                                <input type="checkbox" name="active" checked value="1">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </form>
    </div>

</section>
@endsection

<!-- Page specific script -->
@push('script_function_validate')
{{-- <script>
    // $.validator.addMethod("validateModuleName", function (value, element) {
    //         return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
    //     }, "Password must have 8-16 character which include at UPPERCASE , lowercase and at least 1 number");

    // $.validator.addMethod("validateModuleFunctionId", function (value, element) {
    //         return this.optional(element) || //.test(value);
    //     }, "not correctly formatted phone number");
        
    $(function () {
          $("#ModuleCreateForm").validate({
            rules: {
                'function_name': {
                    required: true,
                },
                'module_function_id': {
                    required: true,
               },
            },
            // messages: {
            //     'module_name': {
            //         required: "Please provide a module name",
            //     },
            //     'module_function_id': {
            //         required: "Please provide some functions for the module",
            //    },
            // },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
          });
        });
</script> --}}
@endpush

@push('select2')
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
@endpush