@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
<style>
    .lightbox-image-details img {
        width: 100%;
        height: 150px;
    }
 
</style>
<link href="{{ asset('assets/site/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/site/lightgallery/dist/css/lg-fb-comment-box.min.css')}}" rel="stylesheet">
@endsection
@section('content')

<section class="news-blog" style="background: linear-gradient(to bottom, rgba(145, 138, 138, 0), rgba(0, 0, 0, 0)), url({{ asset($data['album_title']->image )}}) no-repeat center center;background-size: cover;position: relative;height: 500px;">
    <div class="container">
        <div class="justify-content-center">
            <div class="d-flex justify-content-center py-5">
                <div class="px-2">
                    <a href="" class=" bg-dark-a ">
                        <span>Gallery</span>
                    </a>
                </div>
            </div>
            <div class="text-center text-white">
                <h2>@if(isset($data['album_title']->title)) {{ $data['album_title']->title }} @endif</h2>
            </div>
            <div class="d-flex justify-content-center ">
                <div class="d-flex namaste-text-details ">
                    @if( isset($all_view['setting']->logo) )
                    <img class="namaste-logo-details" src="{{ asset($all_view['setting']->logo) }}">
                    @endif
                    <p class="px-2">BY <a href="">@if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif</a> / {{ date('F, Y, D', strtotime($data['album_title']->created_at)) }} / IN <a href="">@if(isset($data['single']->postCategory)) {{ $data['single']->postCategory->title }} @endif</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section style="background-color: #00021D;">
    <div class=" container py-4">
        <div class="row">
            <div class="col-lg-8" id="gallery">
                @if(isset($data['gallery']))
                @foreach($data['gallery']->slice(0,1) as $row)
                <div class="">
                
                     <a href="{{$row->image}}"
                         data-fancybox="gallery"
                         data-caption="{{ $row->title }}"
                         class="col-lg-4 col-md-6 py-2">
                        <img src="{{$row->image}}" alt="{{ $row->title }}" class="w-100" /> 
                      </a>
                </div>
                @endforeach
                @endif
                <div class="row py-3" >
                    @if(isset($data['gallery']))
                    @foreach($data['gallery']->slice(1,1000) as $row)
                    <!--<a href="{{$row->image}}" data-lg-size="1024-800" class="col-lg-4 col-md-6 py-2">-->
                    <!--    <img alt="{{$row->title}}" class="w-100" src="{{$row->image}}" />-->
                    <!--</a>-->
                      <a href="{{$row->image}}"
                         data-fancybox="gallery"
                         data-caption="{{ $row->title }}"
                         class="col-lg-4 col-md-6 py-2">
                        <img src="{{$row->image}}" alt="{{ $row->title }}" class="w-100" />
                      </a>
                    @endforeach
                    @endif
                </div>
                <div class="container text-center my-5">
                    <div class="tags">
                        <a href="#" class="btn btn-outline-light mx-1"># Mount Everest</a>
                        <a href="#" class="btn btn-outline-light mx-1"># Namaste Sound</a>
                    </div>

                    <div class="share mt-4">
                        <span class="text-white">Share your love</span>
                        <div class="social-icons my-3">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-x"></i></a>
                            <a href="#"><i class="bi bi-pinterest"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-telegram"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                            <a href="#"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>

                    <div class="logo my-4">
                        @if( isset($all_view['setting']->logo) )
                        <img src="{{ asset($all_view['setting']->logo) }}" alt="Namaste Sound Logo" class="img-fluid">
                        @endif
                    </div>

                    <div class="description">
                        @if(isset($all_view['setting']->site_name))
                        <h3 class="mb-4"> {{ $all_view['setting']->site_name }}</h3>
                        @endif
                        @if(isset($all_view['setting']->site_description))
                        <p>{{ $all_view['setting']->site_description }}</p>
                        @endif
                        </p>
                    </div>

                    <div class="social-links my-4">
                        <a href="#" class="btn btn-light mx-1"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-light mx-1"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/@NamasteSound" class="btn btn-light mx-1" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>

                    <div class="articles">
                        <p>ARTICLES: 10</p>
                    </div>
                    <hr style="color: white" />
                </div>
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 text-start">
                        @if(isset($data['prevPost']))
                        <a href="{{ route('site.photos.show', ['id'=> $data['prevPost']->id]) }}" class="prev-post text-white">
                            <img src="{{ asset($data['prevPost']->image)}}" class="rounded-circle w-25" alt="Previous Post">
                            {{ $data['prevPost']->title }}
                        </a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 text-end">
                        @if(isset($data['nextPost']))
                        <a href="{{ route('site.photos.show', ['id'=> $data['nextPost']->id]) }}" class="next-posta text-white justify-content-between">
                            {{ $data['nextPost']->title }}
                            <img src="{{ asset($data['nextPost']->image)}}" class="rounded-circle w-25" alt="Next Post">
                        </a>
                        @endif
                    </div>
                </div>
                <hr style="color: white" />
                <h3 class="mb-4 text-white">Leave a Reply</h3>

                <form class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Name" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Name" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="website" class="form-label text-white">Website</label>
                            <input
                                type="url"
                                class="form-control"
                                id="website"
                                placeholder="Website" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label text-white">Add Comment *</label>
                        <textarea
                            class="form-control"
                            id="comment"
                            rows="5"
                            placeholder="Add Comment"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="saveInfo" />
                        <label class="form-check-label text-white" for="saveInfo">
                            Save my name, email, and website in this browser for the next
                            time I comment.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Post Comment
                    </button>
                </form>
            </div>
            <div class="col-lg-4 py-2">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div>

                    <div class=" post-container">
                        <h3 class="text-white">Posts</h3>
                        @if(isset($data['album_list']))
                        @foreach($data['album_list'] as $row)
                        @if(Route::has('site.photos.show'))
                        <div class="post">
                            <a href="{{ route('site.photos.show', ['id'=> $row->id]) }}">
                                <img src="{{ asset($row->image) }}" alt="Walkathon">
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

<section style="background-color: rgb(14, 10, 66);">
    <div class="container py-5">
        <h2 class="text-white">Related Posts</h2>
        <div class="row">
            @if(isset($data['most_visited_links']) && $data['most_visited_links']->count() > 0)
            @foreach($data['most_visited_links'] as $row)
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
</script>
@endsection