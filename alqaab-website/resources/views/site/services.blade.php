@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/site/plugin/lightbox/lightbox.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/site/flickity-docs/docs/flickity.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<style>
    .image-card-services {
        width: 80px;
        height: 40px;
        overflow: hidden;
    }
    
    .object-fit-cover {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    
    /* Flickity Carousel Styling */
    .carousel {
        width: 100%;
        margin-bottom: 0px;
    }
    
    .carousel-cell {
        width: 33%;
        margin-right: 10px;
    }
    
    .carousel-cell img {
        display: block;
        width: 100%;
        height: 127px;
        object-fit: cover;
        cursor: pointer;
    }
    
    .flickity-viewport {
        height: 127px !important;
    }
</style>
@endsection

@section('content')
<section class="our-services d-flex align-items-center" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url({{ asset('assets/site/image/LED-Screen-6.PNG')}}) no-repeat center center;
        background-size: cover;
        position: relative;
        height: 500px;margin-top:-100px;">
    <div class="container">
        <div class="text-white py-3">
            <p class="py-4">Services</p>
            <h1 class="">Our Services </h1>
            <p class="lead">Discover the range of professional sound services we offer.</p>
        </div>
    </div>
</section>
<section style="background-color: #fff;">
    <div class="container py-4">
        <div class="row">
            @if($data['rows'] && !empty($data['rows']))
                @foreach($data['rows'] as $key => $row)
                    <?php 
                        $serviceImages = App\Models\File::where('service_id', $row->id)->get();
                        $firstImage = $serviceImages->first();
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="service-card  text-dark">
                            {{-- Service Title --}}
                           

                            {{-- First Image --}}
                            
                                @php
                                    $serviceImage = asset(\App\Support\SitePresentation::servicePath($row->image, $loop->index));
                                @endphp
                                <a href="{{ $serviceImage }}" data-fancybox="gallery-{{ $row->id }}" data-caption="{{ $row->title }}">
                                    <img src="{{ $serviceImage }}" alt="{{ $row->title }}" class="img-fluid rounded shadow-sm object-fit-cover" style="height:180px; width:100%; object-fit:cover;">
                                </a>
                                 <h5 class="my-2">
                                <a href="{{ route('site.services.show', ['id' => $row->id]) }}" class="text-dark text-decoration-none">
                                    {{ $row->title }}
                                </a>
                            </h5>
                            
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center text-white py-5">
                    <h4>No services found</h4>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- <section style="background-color: #171717;">
    <div class="container py-2">
        <div class="row">
            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows'] as $key => $row)
            <?php 
                $serviceImages = App\Models\File::where('service_id', $row->id)->get();
                $firstImage = $serviceImages->first();
            ?>
            <div class="col-lg-6 d-flex gap-3 @if($key > 0) py-2 @endif">
                <div class="bg-danger w-100">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton{{ $key }}" role="button">
                            <i id="collapseIcon{{ $key }}" class="bi bi-plus-lg">{{ $row->title }}</i>
                        </a>
                    </p>

                    <div class="collapse show" id="collapseExample{{ $key }}">
                        <div class="card card-body text-dark bg-dark">
                            @if($serviceImages->count() > 0)
                            <div class="carousel" id="carousel-{{ $row->id }}">
                                @foreach($serviceImages as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-fancybox="gallery-{{ $row->id }}" data-caption="{{ $row->title }}">
                                        <img src="{{ asset($f->file)}}" alt="{{ $row->title }}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center text-white py-4">
                                No images available for this service
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="image-card-services">
                    @if($firstImage)
                    <a href="{{ asset($firstImage->file)}}" data-fancybox="gallery-{{ $row->id }}" data-caption="{{ $row->title }}">
                        <img src="{{ asset($firstImage->file) }}" alt="{{ $row->title }}" width="80" height="40" class="object-fit-cover">
                    </a>
                    @else
                    <img src="https://via.placeholder.com/80x40?text=No+Image" alt="No image available" width="80" height="40" class="object-fit-cover">
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 text-center text-white py-5">
                <h4>No services found</h4>
            </div>
            @endif
        </div>
    </div>
</section> --}}

<!-- JavaScript -->
<script src="{{ asset('assets/site/flickity-docs/docs/flickity.pkgd.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    // Initialize Fancybox
    Fancybox.bind("[data-fancybox]", {});
    
    // Initialize Flickity carousels
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.carousel').forEach(function(carousel) {
            new Flickity(carousel, {
                cellAlign: 'left',
                contain: true,
                wrapAround: true,
                autoPlay: false,
                pageDots: false,
                imagesLoaded: true,
                percentPosition: false
            });
        });
    });
</script>
@endsection
