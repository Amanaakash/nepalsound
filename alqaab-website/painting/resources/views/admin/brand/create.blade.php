
@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Create Brand</h3>
    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Brand Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Brand URL</label>
            <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com">
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Brand Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <small class="text-muted">Max size: 2MB | Supported formats: JPG, PNG, JPEG</small>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection