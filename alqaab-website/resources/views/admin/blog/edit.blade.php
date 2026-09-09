@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />

@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->post_unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input name="type" type="hidden" value="post">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Select Category</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Post Category</label>
                                    <select name="category_id" class="form-control category_id select_category" id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($data['category'] as $row)
                                        <option value="{{ $row->id }}" @if($data['rows']->category_id == $row->id) selected @endif >{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>First Title</label>
                                    <input type="text" name="title" class="form-control" id="" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" id="my-editor" cols="30" rows="9" class="form-control rounded short">@if(isset($data['rows']->short_description)) {{ $data['rows']->short_description   }} @endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Thumbnail</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Thumbnail Image</label>
                                    <input class=" form-control" type="file" id="image" name="image" value="" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if($data['rows']->thumbs)
                            <div class="form-group">
                                <img src="{{ $data['rows']->thumbs }}" class="img  img-responsive" width="80px" height="80px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Optional</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Publish Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                        <input class="form-control" type="text" value="@if(isset($data['rows']->publish_date)) {{ $data['rows']->publish_date   }} @endif" id="publish_date" name="publish_date">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="image" class="">Link</label>
                                    <input class=" form-control" type="url" name="url" id="url" value="@if(isset($data['rows']->url)) {{ $data['rows']->url   }} @endif">
                                </div>
                                <div class="form-group ">
                                    <label for="image" class="">Thumbnail Logo</label>
                                    <input class=" form-control" type="file" name="thumbs_2" accept="image/png, image/gif, image/jpeg">
                                    @if($data['rows']->thumbs_2)
                                    <div class="form-group">
                                        <img src="{{ $data['rows']->thumbs_2 }}" class="img  img-responsive" width="80px" height="80px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Status</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Published</label>
                                        <div class="form-group">
                                            <label class="ui-checkbox">
                                                <input type="hidden" name="status" value=0><span class="input-span"></span>
                                                <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <!-- Begin Progress Bar Buttons-->
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>=
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="{{ asset('assets/cms/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(document).ready(function() {
        // Bootstrap datepicker
        $("#publish_date").datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            endDate: '+0d',


        });
        //ckeditor
        CKEDITOR.replace('my-editor', options);
        CKEDITOR.replace('my-editor-1', options);

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };


        //select 2
        $(".select_category").select2({
            placeholder: "Select",
            allowClear: true
        });

    });
</script>
@endsection