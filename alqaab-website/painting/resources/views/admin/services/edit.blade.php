@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
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
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
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
                            <div class="form-group">
                                <label for="title">Services Name</label>
                                <input class="form-control rounded" type="text" name="title" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" placeholder="Services Name">
                            </div>
                            <div class="form-group">
                                <label for="title">Services Description</label>
                                <textarea name="description" cols="2" rows="4" class="form-control rounded" value="">{{ $data['rows']->description   }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Thumbnail</label>
                                <input class="form-control" type="file" name="image" id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                                @if($data['rows']->image)
                                <img src="{{ asset($data['rows']->image) }}" class="img img-responsive" width="100px" alt="{{$data['rows']->title}}" title="{{$data['rows']->title}}">
                                @else
                                Image Not found !
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Multiple Image</label>
                                <input class="form-control" type="file" name="images[]" multiple id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="form-group">
                                @if(isset($data['file'])) <br>
                                <div class="row form-group">
                                    @foreach($data['file'] as $row)
                                    <div class="col-2">
                                        <img src="{{ asset($row->file) }}" alt="" class="img img-fluid img-responsive img-thumbnail" style="height: 100px;width:100px;">
                                        @if(Route::has($_base_route.'.destroyFile'))
                                        <button id="delete" type="button" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroyFile', ['id'=>$row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
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
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

@endsection