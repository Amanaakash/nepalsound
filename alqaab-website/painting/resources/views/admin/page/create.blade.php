@extends('layouts.admin')
@section('title')
Admin Post Add | SCMS
@endsection
@section('styles')
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
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
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <input name="type" type="hidden" value="page">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Create Pages</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>First Title</label>
                                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" cols="30" rows="9" id="my-editor" class="form-control rounded short">{{ old('short_description') }}</textarea>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Second Title</label>
                                    <textarea name="second_title" class="form-control rounded summernote" id="" cols="30" rows="10">{{ old('second_title') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="description" cols="30" rows="9" id="my-editor" class="form-control rounded">{{ old('description') }}</textarea>
                            </div> -->
                            <!-- <div class="form-group">
                                <label style="text-decoration: underline;">Advantage Content</label>
                                <div class="box-body">
                                    <div class="increment-resource">
                                        <button type="button" class="btn btn-secondary btn-sm btn-file"><i class="fa fa-plus" aria-hidden="true"></i> Add Advantage</button>
                                    </div>
                                    <div class="file-block"></div>
                                    <div class="clone-file hidden">
                                        <div class="control-group">
                                            <div class="form-group">
                                                <label for="titleFile">Advantage Title</label>
                                                <input type="title" name="advantage_title[]" class="form-control" id="titleFile" placeholder="Enter Advantage Title" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="uploadFile">Upload Image</label>
                                                <input type="file" name="advantage_file[]" class="form-control" id="uploadFile" placeholder="" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="uploadFile">Advantage Description</label>
                                                <textarea name="advantage_desc[]" id="" class="form form-control " cols="30" rows="2"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm  pull-right btn-file-remove">Remove</button><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="text-decoration: underline;">Course Content</label>
                                <div class="box-footer increment-resource">
                                    <button type="button" class="btn btn-info btn-sm btn-resource"><i class="fa fa-plus" aria-hidden="true"></i> Add Content</button>
                                </div>

                                <div class=" clone-resource hidden">
                                    <div class="control-group">
                                        <label for="resourceTitle">Module</label>
                                        <input type="text" name="course_title[]" class="form-control" id="resourceTitle" placeholder="Module">
                                        <label for="resourceDescription">Description</label>
                                        <textarea type="text" name="course_description[]" class="form-control summernote" id="resourceDescription" placeholder="Description"></textarea>
                                        <button type="button" class="btn btn-warning  btn-sm pull-right btn-remove">Remove </button><br>
                                    </div>
                                </div>
                                <div class=" resource-info-block ">
                                </div>
                            </div> -->
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
                                    <input class=" form-control" type="file" id="image" name="image" value="" accept="image/png, image/gif, image/jpeg, image/webp">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="image" class="">Thumbnail Logo</label>
                                <input class=" form-control" type="file" name="thumbs_2" id="">
                            </div>
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Multiple Image</label>
                                    <input class="form-control" type="file" name="images[]" multiple id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
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
                                                <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <div class="form-group">
                                            <label class="ui-checkbox">
                                                <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                                <input type="checkbox" name="featured" value=1><span class="input-span"></span>
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
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        //ckeditor
        CKEDITOR.replace('my-editor', options);
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        // $('.summernote').summernote({
        //     placeholder: 'TItle',
        //     tabsize: 2,
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
        // $('.summernote').summernote({
        //     tabsize: 2,
        //     height: 60,
        //     toolbar: [
        //         // [groupName, [list of button]]
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         ['fontsize', ['fontsize']],
        //         ['color', ['color']],
        //         ['height', ['height']],
        //         ['para', ['ul', 'ol', 'paragraph']],

        //     ]
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