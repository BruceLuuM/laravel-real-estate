@extends('adminLTE.layout.master')
@section('title','Admin Admin Management')
@section('AdminsManagement','active')

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
                <h1>Admin Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <form action="{{route('adminStoreAdmin')}}" method="post" id="AdminCreateForm" class="col-md-4">
            @csrf
            <div class="sticky-top" style="top:0.5em">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add a new admin</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="InputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="InputName"
                                        placeholder="Enter name">
                                </div>
                                @error('name')
                                <p class="error"> {{$message}} </p>
                                @enderror
                                <div class="form-group">
                                    <label for="InputEmail1">Phone number</label>
                                    <input type="tel" name="phonenumber" class="form-control" id="InputPhoneNumber"
                                        placeholder="Enter phone number">
                                </div>
                                @error('phonenumber')
                                <p class="error"> {{$message}} </p>
                                @enderror

                                <div class="form-group">
                                    <label for="InputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="InputEmail"
                                        placeholder="Enter email">
                                </div>
                                @error('email')
                                <p class="error"> {{$message}} </p>
                                @enderror

                                <div class="form-group">
                                    <label for="role_function_id">Roles</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Roles of admin"
                                        style="width: 100%;" name="role_function_id[]" id="RoleID">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">
                                            {{$role->role_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role_function_id')
                                <p class="text-danger"> {{$message}} </p>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
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
                        <a href="{{route('adminManageAdmin')}}" class="btn btn-secondary">Cancel</a>
                        <button type="commit" class="btn btn-success float-right">Create</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-8">
            <form action="">
                <div class="card card-secondary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Create new roles</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="InputEmail1">Role name: </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Role name">
                        </div>
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
            </form>
        </div>
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Existing roles</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <fieldset class="border rounded p-2">
                    <legend class="text-center">Roles</legend>
                    <table id="AdRo" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role name</th>
                                <th>Description</th>
                                <th>--permission list--</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $index = 1;
                            @endphp
                            @foreach($roles as $role)
                            <tr>
                                <td> {{$index++}}
                                </td>
                                <td>
                                    <div>
                                        {{$role->role_name}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{$role->description}}
                                    </div>
                                </td>
                                <td>
                                    {{$role->permission_id}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection

<!-- Page specific script -->
@push('script_admin_validate')
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

    // validate
    $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
        }, "Password must have 8-16 character which include at UPPERCASE , lowercase and at least 1 number");

    $.validator.addMethod("validateCorrectPhoneNumber", function (value, element) {
            return this.optional(element) || /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test(value);
        }, "not correctly formatted phone number");
        
    $(function () {
          $("#AdminCreateForm").validate({
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
                    required: true,
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