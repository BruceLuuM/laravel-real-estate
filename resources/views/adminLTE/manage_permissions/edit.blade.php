@extends('adminLTE.layout.master')
@section('title','Admin module Management')
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
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>EDIT Module</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Module</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="{{route('adminUpdateModule',['module'=>$module->id])}}" method="post" id="ModuleEditForm"
            class="col-md-6">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editing Module ID: {{$module->id}}</h3>
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
                                            placeholder="Enter module name" value="{{$module->module_name}}">
                                        @error('module_name')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="module_route">Module Route</label>
                                        <input type="text" name="module_route" class="form-control" id="ModuleRoute"
                                            placeholder="Enter module route" value="{{$module->module_route}}">
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
                                            placeholder="Enter module folder" value="{{$module->module_folder}}">
                                        @error('module_folder')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="module_file">Module File</label>
                                        <input type="text" name="module_file" class="form-control" id="ModuleFile"
                                            placeholder="Enter module file" value="{{$module->module_file}}">
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
                                            placeholder="Enter module name" value="{{$module->module_css}}">
                                        @error('module_css')
                                        <p class="text-danger"> {{$message}} </p>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="module_position">Module position</label>
                                        <input type="text" name="module_position" class="form-control"
                                            id="ModulePosition" placeholder="Enter module position"
                                            value="{{$module->module_position}}">
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
                                    <option value="{{$moduleFunction->id}}" @foreach($id_arrs as $id_arr)
                                        @if($id_arr==$moduleFunction->id)
                                        {{'selected'}}
                                        @endif
                                        @endforeach
                                        >
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
                    <button type="commit" class="btn btn-success float-right">Edit</button>
                </div>
            </div>
        </form>
        <div class="row col-md-6">
            <div class="col-md">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Module Function Structure</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <fieldset class="border rounded p-2">
                            <legend class="text-center">Function structure</legend>
                            <table id="FuncS" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Function Name</th>
                                        <th>Module route name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 1;
                                    @endphp
                                    @foreach(explode(" ",$module->module_function_id) as $function)
                                    @foreach($moduleFunctions as $moduleFunction)
                                    @if($moduleFunction->id != $function)
                                    @continue
                                    @endif

                                    <tr>
                                        <td> {{$index++}}
                                        </td>
                                        <td class="align-items-center">
                                            <div>
                                                {{$moduleFunction->function_name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-12">
                                                {{$moduleFunction->function_route}}
                                            </div>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{route('adminEditModuleFunction',['modulefunction'=>$moduleFunction->id])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn p-0 text-center">
                                                <form
                                                    action="{{route('adminDeleteModuleFunction',['modulefunction'=>$moduleFunction->id]);}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset class="border rounded">
                            <legend class="text-center">Action</legend>
                            <div class="card-header text-center">
                                <a class="btn btn-success" href="{{route('adminCreateModule')}}">
                                    Add a Module/Function
                                </a>
                            </div>

                        </fieldset>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
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
    
    // fast search attr
    $(function () {
        $("#FuncS")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
          })
          .buttons()
          .container()
          .appendTo("#FuncS_wrapper .col-md-6:eq(0)");
      });
</script>
@endpush