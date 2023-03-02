@extends('adminLTE.layout.master')
@section('title','Admin Category Management')
@section('CategoriesManagement','active')

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
                <h1>Manage category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage category</li>
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
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreateCategory')}}">Add a
                            Category</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Cat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Type name</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->id}}
                                    </td>
                                    <td>
                                        {{$category->type}}
                                    </td>
                                    <td>
                                        {{$category->type_name}}
                                    </td>
                                    <td>
                                        {{$category->created_at}}
                                    </td>
                                    <td>
                                        {{$category->updated_at}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{route('adminShowCategory',['category'=>$category->id])}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('adminEditCategory',['category'=>$category->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn p-0">
                                            <form action="{{route('adminDeleteCategory',['category'=>$category->id]);}}"
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
                                    <th>Type</th>
                                    <th>Type name</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
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
@endsection

<!-- Page specific script -->
@push('script_tablefunction')
<script>
    $(function () {
        $("#Cat")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#Cat_wrapper .col-md-6:eq(0)");
      });
</script>
@endpush