@extends('adminLTE.layout.master')
@section('title','Admin Permission Management')
@section('PermissionsManagement','active')

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
                <h1>Manage Permissions <p id="test"></p>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Permission</li>
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
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreatePermission')}}">Add a
                            Permission</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Per" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:4%">#</th>
                                    <th style="width:4%">ID</th>
                                    <th>Structure</th>
                                    <th style="width:4%">View</th>
                                    <th style="width:4%">Edit</th>
                                    <th style="width:4%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $index = 1;
                                @endphp

                                @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        {{$index++}}
                                    </td>
                                    <td>
                                        {{$permission->id}}
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{$permission->permission_name}}
                                        </div>
                                    </td>
                                    <td class="project-actions text-center">
                                        <div>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{route('adminShowPermission',['permission'=>$permission->id])}}">
                                                <i class="fas fa-folder">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('adminEditPermission',['permission'=>$permission->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                    </td>

                                    <td class="project-actions text-center">
                                        <a class="btn p-0 text-center">
                                            <form
                                                action="{{route('adminDeletePermission',['permission'=>$permission->id]);}}"
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
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Structure</th>
                                    <th>View</th>
                                    <th>Edit</th>
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
@push('manage_permission_table')
<script>
    $(function () {
        $("#Per")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
          })
          .buttons()
          .container()
          .appendTo("#Per_wrapper .col-md-6:eq(0)");
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