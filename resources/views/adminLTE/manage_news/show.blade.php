@extends('adminLTE.layout.master')
@section('title','Admin New Management')
@section('NewsManagement','active')

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
                <h1>New Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New Detail</li>
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
            <h3 class="card-title">{{$new->news_header}}</h3>

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
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="col-12">
                                <img src="{{$new->new_logo ? asset('storage/'. $new->new_logo) : asset('/images/no_image.jpg')}}"
                                    class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img class="img-fluid"
                                        src="{{$new->new_logo ? asset('storage/'. $new->new_logo) : asset('/images/no_image.jpg')}}"
                                        alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="{{asset('/images/no_image.jpg')}}"
                                        alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="{{asset('/images/no_image.jpg')}}"
                                        alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="{{asset('/images/no_image.jpg')}}"
                                        alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="{{asset('/images/no_image.jpg')}})"
                                        alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8">
                            <h3 class="my-3">{{$new->name}} Review</h3>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Số phòng ngủ</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{$new->num_bed_rooms}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Số phòng vệ sinh</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{$new->num_wc_rooms}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted"> Gía trị pháp lý</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{$new->law_related_info}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Price: <strong style="color:red">{{$new->price.'
                                    '.$new->price_unit}}</strong> </p>
                            <p>Area: {{$new->area . ' '. $new->area_unit }} </p>
                            <p>Address: {{$new->province->full_name}},
                                {{$new->district->full_name}},
                                {{$new->ward->full_name}}</p>
                            </p>
                            <hr>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>
                            <div class="text-center mt-5 mb-3">
                                <a href="{{route('adminEditNew',['new'=>$new->id])}}"
                                    class="btn btn-block btn-outline-primary btn-sm">Edit</a>
                                <a class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal"
                                    data-target="#modal-warning">Report
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Tổng quan</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                    href="#product-comments" role="tab" aria-controls="product-comments"
                                    aria-selected="false">Đánh giá (Example <i class="fa fa-wrench"
                                        aria-hidden="true"></i>
                                    )</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                    href="#product-rating" role="tab" aria-controls="product-rating"
                                    aria-selected="false">Xếp hạng(Example <i class="fa fa-wrench"
                                        aria-hidden="true"></i>
                                    )</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab"> {!!$new->description!!}
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                aria-labelledby="product-comments-tab">
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{asset('dist/img/user1-128x128.jpg')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 7:45 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.Lorem ipsum represents a long-held tradition
                                        for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.Lorem ipsum represents a long-held tradition
                                        for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 1 v2</a>
                                    </p>
                                </div>

                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Image">
                                        <span class="username">
                                            <a href="#">Sarah Ross</a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>
                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 2</a>
                                    </p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{asset('dist/img/user1-128x128.jpg')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 5 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                            File 1 v1</a>
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                aria-labelledby="product-rating-tab">
                                On Process ... <i class="fa fa-wrench" aria-hidden="true"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
@push('script_new_image_change')
<script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    })
</script>
@endpush