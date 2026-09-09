@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .image-container {
        transition: transform 0.8s;
        overflow: hidden;
        width: 100%;
        height: 300px;
    }

    .image-container .image-container1 {
        transition: transform 0.8s;
        overflow: hidden;
        width: 100%;
        height: 250px;
    }

    .image-container .image-container1 img {
        transition: all 500ms ease-out;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container .image-container1:hover img {
        transform: scale(1.1);
    }

    body {
        background-color: #0a0c26;
        color: #fff;
    }

    .payment-section {
        padding: 50px;
        text-align: center;
    }

    .payment-logos img {
        max-width: 100px;
        margin: 10px;
    }

    .contact-btn {
        margin-top: 20px;
    }

    .eventgallary {
        background: linear-gradient(to bottom,
                rgba(233, 7, 7, 0.8),
                rgba(0, 0, 0, 0.8)),
            url(./image/LED-Screen-6.webp) no-repeat center center;
        background-size: cover;
        position: relative;
        height: 320px;
    }

    .youtub {
        font-size: 50px;
    }
    section.blog-section-hhh {
        background: #080034!important;
    }
</style>
@endsection
@section('content')
<section class="eventgallary">
    <div class="container payment-section">
        <div class="row">
            <div
                class="col-md-6 d-flex flex-column justify-content-center align-items-start">
                <p>EVENT GALLERY</p>
                <h3 class="text-white">Event Gallery</h3>
                <p>Capturing Sound, Moments, Explore Our Event Gallery</p>
            </div>
            <div class="col-md-6 payment-logos">
                <div class="youtub">
                    <a href="https://www.youtube.com/@NamasteSound" class="" target="_blank">
                        <i class="bi bi-youtube text-danger"></i>
                    </a>
                    <h1>Watch LIVE</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section-hhh">
    <div class="container py-5">
        <div class="row">
            @if(isset($data['album']))
            @foreach($data['album'] as $row)
            <div class="col-md-4 blog-card">
                @if(Route::has('site.photos.show'))
                <a href="{{ route('site.photos.show', ['id'=> $row->id ]) }}">
                    <div class="blog1">
                        <div class="blog2">
                            <img src="{{asset($row->image)}}" alt="Blog 1" />
                        </div>
                        <div class="blog-card-body-a text-center">
                            <a href="{{ route('site.photos.show', ['id'=> $row->id ]) }}">{{$row->title }}</a>
                        </div>
                    </div>
                </a>
                @endif
                <p class="date text-center">{{ date('F, Y, D', strtotime($row->created_at)) }}</p>
            </div>
            @endforeach
            @else
            <p>Albums Not Found's !</p>
            @endif
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection