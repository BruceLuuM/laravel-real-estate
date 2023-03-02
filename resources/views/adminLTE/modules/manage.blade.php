@extends('adminLTE.layout.master')
@section('title','Admin Module Management')
@section('ModulesManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Modules <p id="test"></p>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Module</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreateModule')}}">Add a
                            Module/Function</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Mod" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width:4%">ID</th>
                                    <th>Structure</th>
                                    <th>Module Folder</th>
                                    <th>Module File</th>
                                    <th>Module main CSS</th>
                                    <th>Module route name</th>
                                    <th>Display position</th>
                                    <th>Save</th>
                                    <th>Edit</th>
                                    <th>Active</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $index = 1;
                                @endphp

                                @foreach($modules as $module)
                                <tr>
                                    <td>
                                        {{$index++}}
                                    </td>
                                    <td>
                                        <i class=" fas fa-caret-right fa-fw mr-2"></i>{{$module->id}}
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$module->module_name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$module->module_folder}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$module->module_name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$module->module_css}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$module->module_route}}
                                        </div>
                                    </td>
                                    <form action="{{route('adminUpdateModulePos',['module'=>$module->id])}}"
                                        method="post" id="ModuleUpdateForm">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="module_position"
                                                    value="{{$module->module_position}}">
                                            </div>
                                        </td>
                                        <td class="project-actions text-center">
                                            <button class="btn btn-success btn-sm" type="commit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </button>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{route('adminEditModule',['module'=>$module->id])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                        </td>
                                        <td class="project-actions text-center">
                                            <input type="hidden" name="active" value="{{$module->active}}"
                                                id="activemodule{{$module->id}}">
                                            <input type="checkbox" name="active" data-bootstrap-switch
                                                id="activemodule{{$module->id}}" data-off-color="danger"
                                                data-on-color="success" @if($module->active==1)
                                            {{'checked'}}
                                            @endif>
                                        </td>
                                    </form>

                                    <td class="project-actions text-center">
                                        <a class="btn p-0 text-center">
                                            <form action="{{route('adminDeleteModule',['module'=>$module->id]);}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @foreach(explode(" ",$module->module_function_id) as $function)
                                @foreach($moduleFunctions as $moduleFunction)
                                @if($moduleFunction->id != $function)
                                @continue
                                @endif

                                <tr>
                                    <td> {{$index++}}
                                    </td>
                                    <td></td>
                                    <td class="d-flex align-items-center">
                                        <i class="fas fa-grip-lines"></i>
                                        <div class="col-12">
                                            {{$moduleFunction->function_name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$moduleFunction->function_folder}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$moduleFunction->function_file}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$moduleFunction->function_css}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$moduleFunction->function_route}}
                                        </div>
                                    </td>
                                    <form
                                        action="{{route('adminUpdateModuleFunctionPos',['modulefunction'=>$moduleFunction->id])}}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            <div class="col-12">
                                                <input type="text" class="form-control" name="function_position"
                                                    value="{{$moduleFunction->function_position}}">
                                            </div>
                                        </td>
                                        <td class="project-actions text-center">
                                            <button class="btn btn-success btn-sm" type="commit">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </button>
                                        </td>
                                        <td class="project-actions text-center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{route('adminEditModuleFunction',['modulefunction'=>$moduleFunction->id])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                            </a>
                                        </td>
                                        <td class="project-actions text-center">
                                            <input type="hidden" name="active" value="{{$moduleFunction->active}}"
                                                id="activemodulefunc{{$moduleFunction->id}}">
                                            <input type="checkbox" name="active" data-bootstrap-switch
                                                data-off-color="danger" data-on-color="success"
                                                value="{{$moduleFunction->active}}" @if($moduleFunction->active==1)
                                            {{'checked'}}
                                            @endif
                                            id="activemodulefunc{{$moduleFunction->id}}">
                                        </td>
                                    </form>

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
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Structure</th>
                                    <th>Module Folder</th>
                                    <th>Module File</th>
                                    <th>Module main CSS</th>
                                    <th>Module route name</th>
                                    <th>Display position</th>
                                    <th>Save</th>
                                    <th>Edit</th>
                                    <th>Active</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
<!-- Page specific script -->
@push('manage_module_table')
<script>
    $(function () {
        $("#Mod")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#Mod_wrapper .col-md-6:eq(0)");
    });
    $("input[data-bootstrap-switch]").each(function(){
        // $(this).bootstrapSwitch('state', $(this).prop("value","1"));
        $(this).bootstrapSwitch({
            onSwitchChange: function(e, state) {
                if(state){
                    $value = 1;
                } else {
                    $value = 0;
                }
                // $(this).val($value);
                $("#"+$(this).attr("id")).val($value);
                // $(this).val($value);
            }
        });
    });        

</script>
@endpush