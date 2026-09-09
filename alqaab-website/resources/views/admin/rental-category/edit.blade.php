@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
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
            {{ method_field('POST') }}
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Category</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title">Category </label>
                                <input class="form-control" type="text" name="title" id="title" value="@if(isset($data['row']->title)) {{ $data['row']->title   }} @endif" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="title">Image</label>
                                <input class="form-control" type="file" name="thumbs" id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                            </div>
                            @if($data['row']->thumbs)
                            <div class="form-group">
                                <img src="{{ $data['row']->thumbs }}" class="img img-thumbnail img-responsive" width="100px" alt="">
                            </div>
                            @else
                            <p>Image Not Found's !</p>
                            @endif
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" id="my-editor" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['row']->description)) {{ $data['row']->description   }} @endif</textarea>
                            </div>
                            <div class="col-md-12">
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
                            <div class="form-group ">
                                <!-- Begin Progress Bar Buttons-->
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                                <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                                <!-- End Progress Bar Buttons-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/js/scripts/form-plugins.js')}}" type="text/javascript"></script>
@endsection