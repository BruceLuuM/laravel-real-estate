@extends('adminLTE.layout.master')
@section('title','Permission Management')
@section('PermissionsManagement','active')

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
                <h1>Permission Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Permission Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminStorePermission')}}" method="post" id="PermissionCreateForm">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="sticky-top" style="top:0.5em">
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add a new permission</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputEmail1">Role name: </label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Role name">
                                    </div>
                                    @error('name')
                                    <p class="error"> {{$message}} </p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="permissions_action_function_id">Custom role</label>
                                        <select class="select2" multiple="multiple"
                                            data-placeholder="Roles of permission" style="width: 100%;"
                                            name="permissions_action_function_id[]" id="RoleID">
                                            @foreach($permissions_actions as $permissions_action)
                                            <option value="{{$permissions_action->id}}">
                                                {{$permissions_action->permissions_action_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('permissions_action_function_id')
                                    <p class="text-danger"> {{$message}} </p>
                                    @enderror
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('adminManagePermission')}}" class="btn btn-secondary">Cancel</a>
                            <button type="commit" class="btn btn-success float-right">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Permission Basic Rules</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <fieldset class="border rounded p-2">
                            <legend class="text-center">Roles Structure</legend>
                            <div class="d-flex flex-row-reverse">
                                <div class="align-self-center">
                                    Check all ?
                                    <input type="checkbox" id="checkAll" class="mr-2">
                                </div>
                            </div>
                            <table id="Mod" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Module</th>
                                        <th>Check all</th>
                                        <th>Watch</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $index = 1;
                                    @endphp
                                    @foreach($modules as $module)
                                    <tr>
                                        <td> {{$index++}}
                                        </td>
                                        <td class="align-items-center">
                                            <div>
                                                {{$module->module_name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check text-center">
                                                <input type="checkbox" class="form-check-input"
                                                    id="checkall{{$module->id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check text-center">
                                                <input type="checkbox" class="form-check-input" name="watch"
                                                    id="w{{$module->id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check text-center">
                                                <input type="checkbox" class="form-check-input" name="create"
                                                    id="c{{$module->id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check text-center">
                                                <input type="checkbox" class="form-check-input" name="edit"
                                                    id="e{{$module->id}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check text-center">
                                                <input type="checkbox" class="form-check-input" name="delete"
                                                    id="d{{$module->id}}">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                    <!-- /.card -->
                </div>
                <form action="{{route('adminStorePermission')}}" method="post" id="PermissionCreateForm">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Permission Custom Rules</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <fieldset class="border rounded p-2">
                                <legend class="text-center">Custom Structure</legend>
                                <div class="form-group">
                                    <label for="InputEmail1">Role name: </label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Role name">
                                </div>
                                @error('name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <div class="form-group">
                                    <label for="InputEmail1">Description: </label>
                                    <textarea name="name" class="form-control" rows="4"
                                        placeholder="Role descriptions"></textarea>
                                </div>
                                @error('name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </fieldset>
                        </div>
                        <!-- /.card -->
                    </div>
                </form>
            </div>
        </div>
    </form>

</section>
@endsection

<!-- Page specific script -->
@push('script_permission_validate')
<script>
    // select2 implement
    $(function() {
        $('.select2').select2()
    });
    
    // check all attr
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    })
    $("input:checkbox").click(function(){
        $val=$(this).attr("id").replace('checkall','');
        $("#w"+$val).not(this).prop('checked', this.checked);
        $("#c"+$val).not(this).prop('checked', this.checked);
        $("#e"+$val).not(this).prop('checked', this.checked);
        $("#d"+$val).not(this).prop('checked', this.checked);
    });

    // fast search attr
    $(function () {
        $("#AdRo")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
          })
          .buttons()
          .container()
          .appendTo("#AdRo_wrapper .col-md-6:eq(0)");
      });
</script>
@endpush