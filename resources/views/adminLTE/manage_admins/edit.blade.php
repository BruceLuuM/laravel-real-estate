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
                <h1>User Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Edit</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form action="{{route('adminUpdateUser',['user'=>$user->id])}}" method="post" id="UserCreateForm">
        @csrf
        @method('PUT')
        <div class=" row">
            <div class="col-md">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editting User ID: {{$user->id}}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputEmail1">Name</label>
                            <input type="text" name="name" class="form-control" id="InputName"
                                placeholder="Enter a name..." value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Phone number</label>
                            <input type="tel" name="phonenumber" class="form-control" id="InputPhoneNumber"
                                placeholder="Enter phone number" value="{{$user->phonenumber}}">
                        </div>
                        @error('phonenumber')
                        <p class="error"> {{$message}}</p>
                        @enderror

                        <div class="form-group">
                            <label for="InputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="InputEmai"
                                placeholder="Enter email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control custom-select">
                                <option value="user" @if ($user->type=='user') {{'selected'}} @endif>User
                                </option>
                                <option value="admin" @if ($user->type=='admin') {{'selected'}} @endif>
                                    Admin
                                </option>
                            </select>
                            @error('purpose')
                            <p class="error"> {{$message}} </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword"
                                placeholder="If this field empty, password unchange!">
                        </div>
                        <div class="form-group">
                            <label>Old Password</label>
                            <input class="form-control" name="oldPassword" class="form-control"
                                value="{{$user->password}}" readonly>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('adminManageUser')}}" class="btn btn-secondary">Cancel</a>
                <button type="commit" class="btn btn-success float-right"> Save changes</button>
            </div>
        </div>
    </form>
</section>
@endsection

@push('script_user_validate')
<script>
    $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/.test(value);
        }, "Password must have 8-16 character which include at UPPERCASE , lowercase and at least 1 number");

    $.validator.addMethod("validateCorrectPhoneNumber", function (value, element) {
            return this.optional(element) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
        }, "not correctly formatted (vietnam) phone number");
    
    $(function () {
          $("#UserCreateForm").validate({
            rules: {
                name: {
                    required: true,
                },
                phonenumber: {
                    required: true,
                    validateCorrectPhoneNumber: true,
                },
                email: {
                    required: true,
                    email: true,
               },
                password: {
                    validatePassword:true,
                }
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address",
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                },
            },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".form-group").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid");
            },
          });
        });
</script>
@endpush