@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

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
                <input name="type" type="hidden" value="page">
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
                                    <label>First Title</label>
                                    <input type="text" name="title" class="form-control" id="" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" id="my-editor" cols="30" rows="9" class="form-control rounded short">@if(isset($data['rows']->short_description)) {{ $data['rows']->short_description   }} @endif</textarea>
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Second Title</label>
                                    <textarea name="second_title" class="form-control rounded summernote" id="" cols="30" rows="10">@if(isset($data['rows']->second_title)) {{ $data['rows']->second_title   }} @endif</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Long Description</label>
                                <textarea name="description" cols="30" rows="9" id="my-editor-1" class="form-control rounded ">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                            </div>
                            <div class="form-group">
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
                                <?php $featuredArray = json_decode($data['rows']->course_content); ?>
                                <label style="text-decoration: underline;">Course Content</label>
                                <div class="box-footer increment-resource">
                                    <button type="button" class="btn btn-info btn-sm btn-resource"><i class="fa fa-plus" aria-hidden="true"></i> Add Content</button>
                                </div>
                                @if($featuredArray)
                                @foreach($featuredArray as $resource)
                                <div class="clone-resource  @if(!$featuredArray)hide @endif">
                                    <div class="control-group">
                                        <label for="resourceTitle">Module</label>
                                        <input type="text" name="course_title[]" value="{{ $resource[0] }}" class="form-control" id="resourceTitle" placeholder="Module">
                                        <label for="resourceDescription">Description</label>
                                        <textarea type="text" name="course_description[]" class="form-control summernote" id="resourceDescription" placeholder="Description">{{ $resource[1] }}</textarea>
                                        <button type="button" class="btn btn-warning  btn-sm pull-right btn-remove">Remove </button><br>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class=" clone-resource">
                                    <div class="control-group">
                                        <label for="resourceTitle">Module</label>
                                        <input type="text" name="course_title[]" value="" class="form-control" id="resourceTitle" placeholder="Module">
                                        <label for="resourceDescription">Description</label>
                                        <textarea type="text" name="course_description[]" class="form-control summernote" id="resourceDescription" placeholder="Description"></textarea>
                                        <button type="button" class="btn btn-warning  btn-sm pull-right btn-remove">Remove </button><br>
                                    </div>
                                </div>
                                @endif
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
                                    <input class=" form-control" type="file" id="image" name="image" value="" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if($data['rows']->thumbs)
                            <div class="form-group">
                                <img src="{{ $data['rows']->thumbs }}" class="img  img-responsive" width="80px" height="80px">
                            </div>
                            @endif
                            <div class="form-group ">
                                <label for="image" class="">Thumbnail Logo</label>
                                <input class=" form-control" type="file" name="thumbs_2" accept="image/png, image/gif, image/jpeg">
                                @if($data['rows']->thumbs_2)
                                <div class="form-group">
                                    <img src="{{ $data['rows']->thumbs_2 }}" class="img  img-responsive" width="80px" height="80px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                                </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Multiple Image</label>
                                    <input class="form-control" type="file" name="images[]" multiple id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if(isset($data['file']))
                            <table class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['file'] as $row)
                                    <tr class="gradeX">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($row->file )}}" alt="" width="50px">
                                        </td>
                                        <td>
                                            @include('admin.section.buttons.button-delete-slider')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <!-- <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Advantage Content List</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            @if(isset($data['advantage']))
                            <table class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TItle </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['advantage'] as $row)
                                    <tr class="gradeX">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! mb_strimwidth($row->sub_title, 0, 20, "...") !!}</td>
                                        <td><img src="{{ asset($row->file )}}" alt="" class="img " width="30px" height="20px"></td>
                                        <td>
                                            @include('admin.section.buttons.button-delete-slider')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Highlights</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="Highlights">Highlights content</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" placeholder="Enter Highlights content" value="" name="highlights_content[]">
                                        <button class="btn btn-success btn-high btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                        <div class="input-group-btn">
                                        </div>
                                    </div>
                                    <div class="slider-image-block-high">
                                    </div>
                                    <div class="clone-high hidden">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="text" class="form-control rounded" placeholder="Enter Highlights content" name="highlights_content[]">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger  btn-remove" type="button">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $featuredArray = json_decode($data['rows']->highlights_content); ?>
                                    <div class="clone-feature @if(!$featuredArray)hide @endif">
                                        @if($featuredArray)
                                        @foreach($featuredArray as $featured)
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="text" name="highlights_content[]" class="form-control rounded" placeholder="Enter Highlights content" value="{{ $featured }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger  btn-remove" type="button">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Tools Master</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="uploadSliderImages">Upload Tools Images</label>
                                    <div class="input-group control-group increment">
                                        <input type="file" name="tools[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success btn-img" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="slider-image-block">

                                    </div>
                                    <div class="clone-img hidden">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="tools[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger btn-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-solid box-primary">
                                @if(isset($data['tools']))
                                <table class="display table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tools </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['tools'] as $row)
                                        <tr class="gradeX">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset($row->file )}}" alt="" class="img " width="30px" height="20px"></td>
                                            <td>
                                                @include('admin.section.buttons.button-delete-slider')
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif

                            </div>
                        </div>
                    </div> -->
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <div class="form-group">
                                            <label class="ui-checkbox">
                                                <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                                <input type="checkbox" name="featured" value=1 @if($data['rows']->featured){{ "checked" }} @endif ><span class="input-span"></span>
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
        $('.summernote').summernote({
            tabsize: 2,
            height: 60,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
        //Course content
        $(document).ready(function() {
            $(".btn-img").click(function() {
                var html = $(".clone-img").html();
                $(".slider-image-block").append(html);
                // $(".increment").after(html);
            });
            $(".btn-resource").click(function() {
                var html = $(".clone-resource").html();
                $(".resource-info-block").append(html);
            });
            $(".btn-file").click(function() {
                var html = $(".clone-file").html();
                $(".file-block").append(html);
            });

            $("body").on("click", ".btn-warning", function() {
                $(this).parents(".control-group").remove();
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();

            });
            //Highlights content
            $(".btn-high").click(function() {
                var html = $(".clone-high").html();
                $(".slider-image-block-high").append(html);
            });
            $("body").on("click", ".btn-danger-high", function() {
                $(this).parents(".control-group").remove();
            });
        });
    });
</script>
@endsection