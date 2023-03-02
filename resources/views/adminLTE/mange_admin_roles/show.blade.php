@extends('adminLTE.layout.master')
@section('title','Admin User Management')
@section('UsersManagement','active')

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
                <h1>User Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Detail</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">

                        <div class="col-12">
                            <h4>Recent Update (Example)</h4>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{asset('dist/img/user1-128x128.jpg')}}" alt="user image">
                                    <span class="username">
                                        <a href="#">Bruce Luu</a>
                                    </span>
                                    <span class="description">Update at: {{$user->updated_at}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$user->name}}</h3>
                    <p class="text-muted">Type: {{$user->type}}</p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Email
                            <b class="d-block">{{$user->email}}</b>
                        </p>
                        <p class="text-sm">Phone number
                            <b class="d-block">{{$user->phonenumber}}</b>
                        </p>
                        <p class="text-sm">Email verified at
                            <b class="d-block">{{$user->email_verified_at}}</b>
                        </p>
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <a href="{{route('adminEditUser',['user'=>$user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-warning">Report</a>

                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger">Get Crypted
                            password and remembered token</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-warning">
                <div class="modal-dialog">
                    <div class="modal-content bg-warning">
                        <div class="modal-header">
                            <h4 class="modal-title">Problems ?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <textarea class="form-control border-0 col">Put your report here....</textarea>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-dark">Send to admin</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Admin Access</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Remember token: {{$user->remember_token}};</p>
                            <p>Password: {{$user->password}}</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection