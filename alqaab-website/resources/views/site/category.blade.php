@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .our-blog-red {}

    .blog-section-abc {
        background-color: #00021d;
    }
</style>
@endsection
@section('content')
@php
    $category = $data['category_name'] ?? null;
    $bgThumb = $category
        ? asset(\App\Support\SitePresentation::categoryPath($category->thumbs))
        : asset('assets/site/image/blog1.webp');
@endphp



<section class="background-about-us d-flex align-items-center"
    style="background: linear-gradient(to bottom, rgba(163,163,163,0%), rgba(0,0,0,0)), url('{{ $bgThumb }}') no-repeat center center;
           background-size: cover; position: relative; height: 500px;margin-top:-100px;">
    <div class="container">
        <div class="text-white py-3">
            @if($category)
                <p class="py-4">{{ $category->title }}</p>
                <h1>{{ $category->title }}</h1>
                <p class="lead">Read our Latest {{ $category->title }}</p>
            @endif
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container py-4">
        <div class="row">
            @if(isset($data['rows']) && count($data['rows']) > 0)
            @foreach($data['rows'] as $row)
            <div class="col-md-4 blog-card">
                <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                    <div class="blog1">
                        <div class="blog2">
                            <img src="{{ asset(\App\Support\SitePresentation::blogPath($row->thumbs, $row->title, $loop->index)) }}" alt="{{ $row->title }}" />
                        </div>
                        <div class="blog-card-body-a">
                            <a class="text-dark" href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">{{ $row->title }}</a>
                        </div>
                    </div>
                </a>
                <p class="date">{{ date('F, Y, D', strtotime($row->created_at)) }}</p>
            </div>
            @endforeach
            @else
            <h2>@if(isset($data['category_name'])){{ $data['category_name']->title }}@endif Not Found's !</h2>
            @endif
        </div>
    </div>
</section>
   
@endsection
@section('js')

@endsection
