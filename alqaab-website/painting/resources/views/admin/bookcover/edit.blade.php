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
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">{{ $_panel }} Edit</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" placeholder="Enter Title" class="form form-control" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif">
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
                            <div class="form-group ">
                                <label for="image" class="">Cover Image</label>
                                <input class=" form-control" type="file" id="image" name="image" value="" accept="image/png, image/gif, image/jpeg">
                            </div>
                            @if(isset($data['rows']->thumbs) && !empty($data['rows']->thumbs))
                            <div class="form-group">
                                <img src="{{ $data['rows']->thumbs }}" class="img  img-responsive" width="50px" height="50px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @else
                            <p>Image Not Found's !</p>
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
                                                <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif><span class="input-span"></span>
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

@endsection