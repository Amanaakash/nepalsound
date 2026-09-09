@extends('site.layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />

<style>
  .installation1 {
    transition: transform 0.8s;
    overflow: hidden;
    width: 100%;
    height: 300px;
  }

  .installation1 .installation2 {
    transition: transform 0.8s;
    overflow: hidden;
    width: 100%;
    height: 250px;
  }

  .installation1 .installation2 img {
    transition: all 500ms ease-out;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .installation1 .installation2:hover img {
    transform: scale(1.1);
  }
</style>
@endsection

@section('content')
<section class="our-blog-red d-flex align-items-center"
  style="background: linear-gradient(to bottom, rgb(0 0 0 / 0%), rgb(0 0 0 / 0%)), url({{ asset($data['single']->thumbs) }}) no-repeat center center; background-size: cover; position: relative; height: 500px;margin-top:-100px;">
  <div class="container">
    <div class="text-white py-3">
      @if(isset($data['single']->title))
        <p class="py-4">{{ $data['single']->title }} </p>
        <h1>{{ $data['single']->title }}</h1>
      @endif
    </div>
  </div>
</section>

<section style="background-color: #0a0c26">
  <div class="container py-3">
      <div class="py-4 text-white"> {!! $data['single']->short_description !!} </div>
    <div class="row" id="gallery">
      @if(isset($data['files']) && count($data['files']))
        @foreach($data['files'] as $row)
          <div class="col-md-4 blog-card py-2">
            <a href="{{ asset($row->file) }}"
               data-fancybox="gallery"
               data-caption="{{ $row->title ?? '' }}">
              <div class="installation1">
                <div class="installation2">
                  <img src="{{ asset($row->file) }}" alt="{{ $row->title ?? 'Image' }}" />
                </div>
              </div>
            </a>
          </div>
        @endforeach
      @else
        <div class="col-12 text-center text-white">
          <p>No images found</p>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    Fancybox.bind('#gallery [data-fancybox="gallery"]', {
      Carousel: {
        infinite: true
      },
      Thumbs: {
        type: "classic"
      },
      Image: {
        zoom: true,
        Panzoom: {
          zoomFriction: 0.7,
          maxScale: 5
        }
      }
    });
  });
</script>
@endsection
