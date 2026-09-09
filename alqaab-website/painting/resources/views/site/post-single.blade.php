@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    p {
        margin-top: 0;
        margin-bottom: 1rem;
        color: #fff;
    }

    .lightbox-image-details img {
        width: 100%;
        height: 150px;
    }
</style>

<link href="{{ asset('assets/site/lightgallery/dist/css/lg-fb-comment-box.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
@endsection
@section('content')

<section class="background-about-us d-flex align-items-center" style="background: linear-gradient(to bottom, rgba(145, 138, 138, 0), rgba(0, 0, 0, 0)), url({{ asset($data['single']->thumbs_2 )}}) no-repeat center center;background-size: cover;position: relative;height: 500px;margin-top:-100px;">
    <div class="container">
        <div class="justify-content-center">
            <div class="d-flex justify-content-center py-5">
                <!--<div class="px-2">-->
                <!--    <a href="" class=" bg-dark-a ">-->
                <!--        <span>BLOG</span>-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div>-->
                <!--    <a href="" class="bg-dark-a">-->
                <!--        <span>NEWS</span>-->
                <!--    </a>-->
                <!--</div>-->
            </div>
            <div class="text-center text-white">
                <h2>@if(isset($data['single']->title)) {{ $data['single']->title }} @endif  </h2>
            </div>
            <p class="text-center text-white" style="font:bold;color:#fff;text-align:center!important;">{!! mb_strimwidth($data['single']->short_description, 0, 300, ) !!}
            </p>
            <div class="d-flex justify-content-center ">
                <div class="d-flex namaste-text-details justify-content-center">
                    @if( isset($all_view['setting']->logo) )
                    <img class="namaste-logo-details" src="{{ asset($all_view['setting']->logo) }}">
                    @endif
                    <p class="px-2">BY <a href="">@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</a> / {{ date('F, Y, D', strtotime($data['single']->created_at)) }} / IN <a href="">@if(isset($data['single']->postCategory)) {{ $data['single']->postCategory->title }} @endif</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section style="background-color: #00021D;">
    <div class=" container py-4">
        <div class="row">
            <div class="col-lg-8">
                <div>
                    @if(isset($data['single']->thumbs))
                    <img class="w-100" src="{{$data['single']->thumbs }}">
                    @else
                    <p>
                        Image Not Found !
                    </p>
                    @endif
                </div>
                <div class="py-4 text-container-main text-white">
                    <p>
                        {!! $data['single']->short_description !!}
                    </p>
                </div>
                <div class="row" id="gallery">
                    <!-- loop -->

                    <?php

                    $model       = new App\Models\Album();
                    $album_id    = $model->where('post_id', $data['single']->id)->orderBy('id', 'asc')->first();
                    $photosModel = new App\Models\Photos();
                    if (isset($album_id->id)) {
                        $photos = $photosModel->where('album_id', $album_id->id)->get();
                    }
                    ?>
                    @if(isset($photos) && $photos->count() > 0)
                    @foreach($photos as $row)
                   <a href="{{ asset($row->image) }}"
                       data-fancybox="gallery"
                       data-caption="{{ $row->title }}"
                       class="col-lg-4 col-md-6 py-2">
                        <div class="namaste-image-details">
                            <img src="{{ asset($row->image) }}" alt="{{ $row->title }}" class="img-fluid">
                        </div>
                    </a>


                    @endforeach
                    @else
                    <p>No photo found</p>
                    @endif
                </div>
                <div class="py-3">
                    <!-- <a href="">
                        <img class="w-100" src="./image/Namaste-Sound-On-the-top-of-Mount-Everest.jpg">
                    </a> -->
                </div>

            </div>
            <div class="col-lg-4 py-2">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div>

                    <div class=" post-container">
                        <h3 class="text-white">Posts</h3>
                        @if(isset($data['most_visited_links']))
                        @foreach($data['most_visited_links'] as $row)
                        @if(Route::has('site.post.show'))
                        <div class="post">
                            <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                                <img src="{{ asset($row->thumbs) }}" alt="Walkathon">
                            </a>
                            <div class="text-white">
                                <h6>{{$row->title }}</h6>
                                <p>{{ date('F, Y, D', strtotime($row->created_at)) }}</p>
                            </div>
                        </div>

                        @endif
                        @endforeach
                        @else
                        <p>No post found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background-color: #00021D">
    <div class="container py-5">
        <h2 class="text-white">Related Posts</h2>
        <div class="row">
            @if(isset($data['related_post']) && $data['related_post']->count() > 0)
            @foreach($data['related_post'] as $row)
            <div class="col-md-4 blog-card">
                <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                    <div class="blog1">
                        <div class="blog2">
                            <img src="{{ asset($row->thumbs)}}" alt="Blog 1">
                        </div>
                        <div class="blog-card-body-a">
                            <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">{{ $row->title }}</a>
                        </div>
                    </div>
                </a>
                <p class="date">{{ date('F, Y, D', strtotime($row->created_at)) }}</p>
            </div>
            @endforeach
            @else
            <p>No related post found</p>
            @endif
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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