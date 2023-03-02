@extends('adminLTE.layout.master')
@section('title','Admin User Management')
@section('UsersManagement','active')

@section('page-level-style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminStoreUser')}}" method="post" id="UserCreateForm">
        @csrf
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add a new user</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputName">Name</label>
                            <input type="text" name="name" class="form-control" id="InputName" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="InputPhoneNumber">Phone number</label>
                            <input type="tel" name="phonenumber" class="form-control" id="InputPhoneNumber"
                                placeholder="Enter phone number">
                        </div>
                        @error('phonenumber')
                        <p class="text-danger"> {{$message}} </p>
                        @enderror

                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="InputEmail"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword"
                                placeholder="Password">
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('adminManageUser')}}" class="btn btn-secondary">Cancel</a>
                <button type="commit" class="btn btn-success float-right">Create</button>
            </div>
        </div>
    </form>
</section>
@endsection

<!-- Page specific script -->
@push('script_user_validate')

@endpush