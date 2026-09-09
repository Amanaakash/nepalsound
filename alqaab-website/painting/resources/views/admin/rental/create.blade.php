@extends('layouts.admin')
@section('title')
Admin Rental Add | SCMS
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
            @csrf
            <div class="row">
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
                                    <label>Rental Category</label>
                                    <select name="category_id" class="form-control category_id select_category" id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($data['rows'] as $row)
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form form-control" value="{{ old('title') }}">
                                </div>
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
                                    <input class="form-control" type="file" id="image" name="image" value="" accept="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">File Section</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="box box-solid box-success">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="increment-resource">
                                        <button type="button" class="btn btn-primary btn-xs btn-file "><i class="fa fa-solid fa-plus"></i> Add New</button>
                                    </div>
                                    <div class="file-block"></div>
                                    <div class="clone-file hidden">
                                        <div class="control-group">
                                            <div class="form-group">
                                                <label for="titleFile">Document Title</label>
                                                <input type="title" name="file_title[]" class="form-control rounded" id="titleFile" placeholder="Enter document title" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="uploadFile">Document</label>
                                                <input type="file" name="files[]" class="form-control rounded" id="uploadFile" placeholder="Enter Username" value="">
                                            </div>
                                            <button type="button" class="btn btn-danger btn-xs  pull-right btn-file-remove">Remove File </button><br>
                                        </div>
                                    </div>
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
<script>
    $(document).ready(function() {
        $(".btn-file").click(function() {
            var html = $(".clone-file").html();
            $(".file-block").append(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection