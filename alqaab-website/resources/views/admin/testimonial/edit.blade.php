@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')

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
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Title</label>
                                    <input class="form-control" type="text" name="name" id="name" value="@if(isset($data['rows']->name)) {{ $data['rows']->name   }} @endif" placeholder="Title">
                                    @if($errors->has('name'))
                                    <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('name') }}</span></p>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="name">Position</label>
                                    <input class="form-control" type="text" name="position" id="position" value="@if(isset($data['rows']->position)) {{ $data['rows']->position   }} @endif" placeholder="Student Name">
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="name">Description</label>
                                    <textarea name="description" id="my-editor-1" cols="30" rows="5" class="form-control rounded" value="" placeholder="Description ">@if(isset($data['rows']->description )) {{ $data['rows']->description   }} @endif</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">Images</label>
                                    <input class="form-control" type="file" name="image" id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                                    @if(isset($data['rows']->image))
                                    <img src="{{ $data['rows']->image }}" class="img img-thumbnail img-responsive" width="200px" style="max-height: 150px;" alt="">
                                    @else
                                    <p>Image fot founs !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Begin Progress Bar Buttons-->
                            <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

@endsection