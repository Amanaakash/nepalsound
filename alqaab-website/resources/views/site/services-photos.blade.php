@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .lightbox-image-details img {
        width: 100%;
        height: 150px;
    }
 
</style>
<link href="{{ asset('assets/site/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/site/lightgallery/dist/css/lg-fb-comment-box.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
@endsection

<!--@section('css')-->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...">-->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />-->

<!--<style>-->
<!--  .lightbox-image-details img {-->
<!--    width: 100%;-->
<!--    height: 150px;-->
<!--    object-fit: cover;-->
<!--  }-->
<!--</style>-->
<!--@endsection-->

@section('content')
<section class="background-about-us d-flex align-items-center" style="background: url({{ asset($data['single']->image) }}) center/cover no-repeat; height: 500px;margin-top:-100px;">
  <div class="container">
    <div class="text-center text-white py-5">
      <h2>{{ $data['single']->title ?? '' }}</h2>
      <p class="px-2">
        BY <strong>{{ $all_view['setting']->site_name ?? '' }}</strong>
        / {{ date('F j, Y', strtotime($data['single']->created_at)) }}
        / IN <strong>{{ $data['single']->postCategory->title ?? '' }}</strong>
      </p>
    </div>
  </div>
</section>

<section style="background-color: #00021D;">
  <div class="container py-4">
    <div class="description text-white">
       {{ $data['single']->description ?? '' }}
    </div>
    <div class="row py-3" id="gallery">
     
      @if(!empty($data['file']))
        @foreach($data['file'] as $row)
          <a href="{{ asset($row->file) }}"
             data-fancybox="gallery"
             data-caption="{{ $row->title }}"
             class="col-lg-4 col-md-6 py-2">
            <img src="{{ asset($row->file) }}" alt="{{ $row->title }}" class="w-100" style="height: 250px;object-fit:cover;" />
          </a>
        @endforeach
      @else
        <div class="col-12 text-white text-center">
          No images available
        </div>
      @endif
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
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
