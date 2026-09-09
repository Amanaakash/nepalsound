@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Certificate</h3>
        <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Certificate Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $certificate->title }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Certificate Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($certificate->image)
                    <div class="mt-2">
                        <img src="{{ asset($certificate->image) }}" width="100" alt="Current Image">
                        <p class="text-muted">Current Image</p>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="imagth" class="form-label">Thumbnail Image</label>
                <input type="file" name="imagth" id="imagth" class="form-control">
                @if($certificate->imagth)
                    <div class="mt-2">
                        <img src="{{ asset($certificate->imagth) }}" width="100" alt="Current Thumbnail">
                        <p class="text-muted">Current Thumbnail</p>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description</label>
                <textarea name="short_description" id="my-editor-1" class="form-control" rows="5">{{ $certificate->short_description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('certificate.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('my-editor-1', options);
        });
    </script>
@endsection