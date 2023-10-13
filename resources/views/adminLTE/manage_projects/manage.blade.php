@extends('adminLTE.layout.master')
@section('title','Admin Project Management')
@section('ProjectsManagement','active')

@section('page-level-style')
<style type="text/css">
    .description_data_view {
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 7;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Project</li>
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
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreateProject')}}">Add a
                            Project</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Cat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Images</th>
                                    <th>Invester</th>
                                    <th>Category</th>
                                    <th>Brief</th>
                                    <th>Description</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>
                                        {{$project->id}}
                                    </td>
                                    <td style="width:200px; height: 105px;">
                                        <img src="{{$project->images ? asset('storage/'. $project->images) : asset('/images/no_image.jpg')}}"
                                            alt="" style="height: 100px; width: 100px">
                                    </td>
                                    <td>{{$project->invester->name}}</td>

                                    <td>{{$project->category->type}}</td>

                                    <td style="width: 300px">
                                        <div class="projects_des" style="padding:0">
                                            <p class="tdDescriptionStyle" style="font-weight:bold;">
                                                {{$project->name}}</p>
                                            <div class="core_info">
                                                <p>Area: <strong style="color:red">{{$project->area.'
                                                        '.$project->area_unit}}</strong>
                                                </p>
                                                <p>Address: {{$project->province->full_name}},
                                                    {{$project->district->full_name}},
                                                    {{$project->ward->full_name}}</p>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="description_data_view">
                                        <p style="width: 300px">{{$project->description}}</p>
                                    </td>

                                    <td>
                                        {{$project->created_at}}
                                    </td>
                                    <td>
                                        {{$project->updated_at}}
                                    </td>
                                    <td class="project-actions text-right" style="width: 224px">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{route('adminShowProject',['project'=>$project->id])}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('adminEditProject',['project'=>$project->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn p-0">
                                            <form action="{{route('adminDeleteProject',['project'=>$project->id]);}}"
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
                                    <th>Images</th>
                                    <th>Invester</th>
                                    <th>Category</th>
                                    <th>Brief</th>
                                    <th>Description</th>
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