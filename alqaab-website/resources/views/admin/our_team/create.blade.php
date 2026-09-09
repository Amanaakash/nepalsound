@extends('layouts.admin')

@section('title')
    Admin {{ isset($item) ? 'Edit' : 'Create' }} Team Member | SCMS
@endsection

@section('styles')
    <link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/cms/vendors/bootstrap-toggle/css/bootstrap-toggle.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index') }}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ isset($item) ? 'Edit' : 'Create' }} Team Member</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ isset($item) ? route($_base_route.'.update', $item->id) : route($_base_route.'.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($item))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" 
                                           value="{{ old('title', $item->title ?? '') }}" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" 
                                           placeholder="E.g. CEO, Developer"
                                           value="{{ old('designation', $item->designation ?? '') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Display Order</label>
                                    <input type="number" name="display_order" class="form-control" 
                                           value="{{ old('display_order', $item->display_order ?? 0) }}">
                                    <small class="text-muted">Higher numbers appear first</small>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="status" value="1"
                                        {{ (isset($item) && $item->status) || !isset($item) ? 'checked' : '' }}
                                        data-toggle="toggle" data-on="Active" data-off="Inactive"
                                        data-onstyle="success" data-offstyle="danger">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Profile Image</label>
                                <input type="file" name="image" class="form-control">
                                @if(isset($item) && $item->image)
                                    <div class="mt-2">
                                        <img src="{{ asset($item->image) }}" alt="Profile" width="100">
                                    </div>
                                @endif
                                <small class="text-muted">Recommended size: 400x400px</small>
                            </div>

                            <div class="form-group">
                                <label>Bio/Description</label>
                                <textarea name="short_description" class="form-control" rows="5" id="short_description">
                                    {{ old('short_description', $item->short_description ?? '') }}
                                </textarea>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> {{ isset($item) ? 'Update' : 'Save' }} Member
                                </button>
                                <a href="{{ route($_base_route.'.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
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
    <script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/cms/vendors/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            // CKEditor
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('short_description', options);

            // Toggle button
            $('[data-toggle="toggle"]').bootstrapToggle();
        });
    </script>
@endsection
