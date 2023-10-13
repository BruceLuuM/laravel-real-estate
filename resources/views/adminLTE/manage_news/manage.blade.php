@extends('adminLTE.layout.master')
@section('title','Admin New Management')
@section('NewsManagement','active')

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
                <h1>Manage New</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage New</li>
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
                        <a class="btn btn-success float-sm-right" href="{{route('adminCreateNew')}}">Add a
                            New</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="Cat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Images</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Brief</th>
                                    <th>Description</th>
                                    <th>Bed rooms</th>
                                    <th>WC rooms</th>
                                    <th>Laws</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $new)
                                <tr>
                                    <td>
                                        {{$new->id}}
                                    </td>
                                    <td style="width:200px; height: 105px;"><img
                                            src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}"
                                            alt="" style="width:100px; height:100px;">
                                    </td>
                                    <td class="newtdStyle">{{$new->user->type}}: {{$new->user->name}}</td>
                                    <td class="newtdStyle">{{$new->category->type}}</td>

                                    <td style="width: 300px">
                                        <div class="news_des" style="padding:0;">
                                            <p class="tdDescriptionStyle" style="font-weight:bold;">
                                                {{$new->news_header}}</p>
                                            <div class="core_info">
                                                <p>Price: <strong style="color:red">{{$new->price.'
                                                        '.$new->price_unit}}</strong> </p>
                                                <p>Area: {{$new->area . ' '. $new->area_unit }} </p>
                                                <p>Address: {{$new->province->full_name}},
                                                    {{$new->district->full_name}},
                                                    {{$new->ward->full_name}}</p>

                                                {{-- {{now()->diff($new->updated_at)}} --}}
                                            </div>

                                        </div>
                                    </td>
                                    <td class="description_data_view">
                                        <p style="width: 300px">{{$new->description}}</p>
                                    </td>
                                    </td>
                                    <td>
                                        {{$new->num_bed_rooms}}
                                        {{-- {{now()->diffInDays($new->updated_at); }} --}}
                                    </td>

                                    <td>
                                        {{$new->num_wc_rooms}}
                                    </td>

                                    <td class="description_data_view">
                                        {{$new->law_related_info}}
                                    </td>

                                    <td>
                                        {{$new->created_at}}
                                    </td>
                                    <td>
                                        {{$new->updated_at}}
                                    </td>
                                    <td class="project-actions text-right" style="width: 224px">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{route('adminShowNew',['new'=>$new->id])}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('adminEditNew',['new'=>$new->id])}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn p-0">
                                            <form action="{{route('adminDeleteNew',['new'=>$new->id]);}}" method="POST">
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
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Brief</th>
                                    <th>Description</th>
                                    <th>Bed rooms</th>
                                    <th>WC rooms</th>
                                    <th>Laws</th>
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