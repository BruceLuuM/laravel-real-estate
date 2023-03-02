@extends('adminLTE.layout.master')
@section('title','Admin Management')
@section('adminsManagement','active')

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
                <h1>Manage admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage admin</li>
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
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreateAdmin')}}">Add a
                            Admin</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Usr" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Roles</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        {{$admin->id}}
                                    </td>
                                    <td>
                                        {{$admin->name}}
                                    </td>
                                    <td>
                                        {{$admin->email}}
                                    </td>
                                    <td>
                                        {{$admin->phonenumber}}
                                    </td>
                                    <td>
                                        {{$admin->roles}}
                                    </td>
                                    <td>
                                        {{$admin->created_at}}
                                    </td>
                                    <td>
                                        {{$admin->updated_at}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{route('adminShowAdmin',['admin'=>$admin->id])}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('adminEditAdmin',['admin'=>$admin->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn p-0">
                                            <form action="{{route('adminDeleteAdmin',['admin'=>$admin->id]);}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Roles</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Function</th>
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
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function () {
        $("#Usr")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#Usr_wrapper .col-md-6:eq(0)");
      });
</script>

@endsection