@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

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
        <form action="{{ route($_base_route.'.update', $data['row']->id )}}" method="POST" enctype="multipart/form-data">
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
                                        @if(isset($data['category']))
                                        @foreach($data['category'] as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == $data['row']->category_id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                        @else
                                        <p>Data not found</p>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>First Title</label>
                                    <input type="text" name="title" class="form-control" id="" value="{{ $data['row']->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="description" id="my-editor" cols="30" rows="9" class="form-control rounded short">{{ $data['row']->description }}</textarea>
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
                            @if($data['row']->image)
                            <div class="form-group">
                                <img src="{{ asset('/upload_file/career/' . $data['row']->image) }}" class="img  img-responsive" width="80px" height="80px" alt="{{ $data['row']->title }}" title="{{ $data['row']->title }}">
                            </div>
                            @endif
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
                                                <input type="checkbox" name="status" value=1 @if($data['row']->status){{ "checked" }} @endif ><span class="input-span"></span>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
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
        // $('.summernote').summernote({
        //     placeholder: 'TItle',
        //     height: 60,
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'italic', 'underline', 'clear']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['height', ['height']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'hr']],
        //         ['view', ['fullscreen', 'codeview']],
        //         ['help', ['help']]
        //     ],

        // });
        // //Course content
        // $(document).ready(function() {
        //     $(".btn-img").click(function() {
        //         var html = $(".clone-img").html();
        //         $(".slider-image-block").append(html);
        //         // $(".increment").after(html);
        //     });
        //     $(".btn-resource").click(function() {
        //         var html = $(".clone-resource").html();
        //         $(".resource-info-block").append(html);
        //     });
        //     $(".btn-file").click(function() {
        //         var html = $(".clone-file").html();
        //         $(".file-block").append(html);
        //     });

        //     $("body").on("click", ".btn-warning", function() {
        //         $(this).parents(".control-group").remove();
        //     });
        //     $("body").on("click", ".btn-danger", function() {
        //         $(this).parents(".control-group").remove();
        //     });
        //     //Highlights content
        //     $(".btn-high").click(function() {
        //         var html = $(".clone-high").html();
        //         $(".slider-image-block-high").append(html);
        //     });
        //     $("body").on("click", ".btn-danger-high", function() {
        //         $(this).parents(".control-group").remove();
        //     });
        // });
    });
</script>
@endsection