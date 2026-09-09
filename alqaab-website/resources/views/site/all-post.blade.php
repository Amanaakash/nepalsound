@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body {
        background-color: #00021d;
        color: #fff;
        font-family: "Arial", sans-serif;
    }

    .card {
        background-color: #030431;
        border: none;
        margin-bottom: 30px;

        height: 600px;
    }

    .card-title {
        color: #fff;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card-title:hover {
        color: red;
    }

    .card-text {
        font-size: 0.95rem;
        color: #ddd;
    }

    .date {
        font-size: 0.85rem;
        color: #aaa;
    }

    .card img {
        height: 320px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .category {
        font-size: 0.85rem;
        color: #9ba0b4;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .card-body {
        padding: 20px;
    }

    .blogs-a {
        color: #fff;
        text-decoration: none;
    }

    .blogs-a:hover {
        color: red;
    }

    .news-b {
        color: #ffff;
        text-decoration: none;
    }

    .news-b:hover {
        color: red;
    }

    .namaste-sounds-hover {
        color: #fff;
        text-decoration: none;
    }

    .namaste-sounds-hover:hover {
        color: red;
    }

    .profile {
        text-align: center;
        padding: 50px 0;
    }

    .profile h1 {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .profile img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .social-icons a {
        margin: 0 10px;
        color: #ffffff;
        font-size: 24px;
    }

    .social-icons .bi-facebook:hover {
        color: red;
    }

    .social-icons .bi-instagram:hover {
        color: red;
    }

    .social-icons .bi-play-circle:hover {
        color: red;
    }

    .meta-info {
        font-size: 0.9rem;
        margin-top: 15px;
    }
</style>
@endsection
@section('content')
<section class="profile">
    <div class="container">
        @if( isset($all_view['setting']->logo) )
        <img src="{{ asset($all_view['setting']->logo) }}" alt="Namaste Sound Logo" class="img-fluid">
        @endif
        @if(isset($all_view['setting']->site_name))
        <h1>{{ $all_view['setting']->site_name }}</h1>
        @endif

        @if(isset($all_view['setting']->site_description))
        <p>{{ $all_view['setting']->site_description }}</p>
        @endif
        <p class="meta-info">Joined: @if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</a> </p>

        <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-play-circle"></i></a>
        </div>
    </div>
</section>
<div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        @if(isset($data['rows'] ) && count($data['rows']) > 0)
        @foreach($data['rows'] as $row)
        <div class="col-md-4">
            <div class="card">
                <div>
                    <p class="category px-3 py-3">
                        <a class="blogs-a" href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">@if(isset($row->postCategory)) {{ $row->postCategory->title }} @endif</a>
                    </p>
                    <h5 class="card-title px-3">{{$row->title}}</h5>
                </div>
                @if(isset($row->thumbs))
                <img
                    src="{{$row->thumbs}}"
                    class="card-img-top-uv"
                    alt="Sonam Losar with Namaste Sound" />
                @else
                <p>
                    Thumbnail not found !
                </p>
                @endif
                <div class="card-body">
                    <p class="card-text">
                        {!! mb_strimwidth($row->short_description, 0, 100, "...") !!}
                    </p>
                    <p class="date">
                        <a class="namaste-sounds-hover" href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">{{ $all_view['setting']->site_name }} </a>/ {{ date('F, Y, D', strtotime($row->created_at)) }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
            <h1>No Post Found</h1>
            @endif
        </div>
    </div>
    @endsection
    @section('js')
    @endsection