@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<style>
    .nav-pills {
        justify-content: space-around;
    }

    .help-block {
        color: red;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }

    .label-info {
        background-color: #17a2b8;

    }

    .label {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out,
            border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
<link href="{{asset('assets/cms/plugin/dropzone/css/dropzone.css')}}" rel="stylesheet" />
@endsection
@section('content')

<h1 class="h4  text-primary"> Add Photo to Gallery</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data">@csrf
            <!-- // Add a hidden input field to store the gallery id -->
            <input type="hidden" name="album_id" value="{{ $id }}">
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ asset('assets/cms/plugin/dropzone/dropzone.js') }}"></script>

@endsection