
@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Brand</h3>
    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Brand Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $brand->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Brand URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $brand->url) }}" placeholder="https://example.com">
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Brand Image</label><br>
            @if($brand->image)
                <img src="{{ asset($brand->image) }}" alt="Brand Image" width="100" class="mb-2 d-block rounded border">
                <small class="text-muted">Current Image</small><br>
            @endif
            <input type="file" name="image" id="image" class="form-control mt-2" accept="image/*">
            <small class="text-muted">Leave empty to keep current image</small>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Brand</button>
        <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection