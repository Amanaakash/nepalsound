@extends('site.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/site/plugin/lightbox/lightbox.css') }}" />
@endsection
@section('content')
    
<div class="banner-section">
    <div id="carouselExampleCaptions" class="carousel slide banner-slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($data['banner'] as $key => $row)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner slider-img">
            @if (count($data['banner']) > 0)
                @foreach ($data['banner'] as $key => $row)
                    <div class="carousel-item position-relative {{ $key == 0 ? 'active' : '' }}">
                        <div class="banner-wrapper">
                            <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->image, $key % 2 === 0 ? 'assets/site/image/blog4.jpg' : 'assets/site/image/blog5.jpg')) }}" class="d-block w-100 banner-img" alt="Banner Image">
                            <div class="carousel-caption container slider-test text-center pt-lg-5 mt-lg-3">
                                <p>{!! $row->description !!}</p>
                                <h1 class="mt-4 d-block">{{ $row->title }}</h1>
                                <a class="read-more-slider" href="{{ $row->url }}">{{ $row->title_second }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Slider Not Found!</p>
            @endif
        </div>

        {{-- Show controls only if more than one banner --}}
        @if (count($data['banner']) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</div>


    <section class="welcome-section  py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                   <div class="col-lg-10 px-4 text-center">
                    <h4 class="text-uppercase">About US</h4>
                    @if (isset($data['featured_pages'][0]))
                        <h2 class="mb-4 text-danger ">{{ $data['featured_pages'][0]->title }} </h2>
                    @endif
                    @if (isset($data['featured_pages'][0]))
                        <p class="text-left-main-side text-center">
                            {!! \Illuminate\Support\Str::limit($data['featured_pages'][0]->short_description, 500) !!}
                        </p>
                    @endif

                    <a href="{{ route('site.about') }}" class="button-more-seeaa mt-3 px-3">Our Values<i
                            class="bi bi-arrow-right"></i></a>
                </div>
               
            </div>
            <div class="row justify-content-center mt-lg-4 mt-3">
                 <div class="col-lg-10">

                    <div class="row">
                        @if (isset($data['featured_pages'][0]))
                            <?php $data['files'] = App\Models\File::where('post_unique_id', $data['featured_pages'][0]->post_unique_id)->get(); ?>
                            @foreach ($data['files']->slice(0, 4) as $f)
                                @php
                                    $fileImage = asset(\App\Support\SitePresentation::blogPath($f->file, $f->title, $loop->index));
                                @endphp
                                <div class="col-lg-3 col-md-3 mb-4">
                                    <a href="{{ $fileImage }}" data-lightbox="models" data-title="caption1"
                                        class="glightbox">
                                        <img src="{{ $fileImage }}" class="img-fluid rounded" alt="{{ $f->title ?? 'Event image' }}" style="height: 300px;">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>
                            <p>File Not Found's !!</p>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section-a">
        <div class="container py-lg-3 py-2">
            <h2 class="mb-lg-4 mb-2 text-center text-white ">Our Services </h2>
            <p class="mb-lg-5 mb-3 text-center text-white">	Al Uqaab Contracting & Services provides comprehensive solutions in Doha, Qatar, including:</p>
            <div class="row">
                @if (isset($data['services']) && count($data['services']) > 0)
                    @foreach ($data['services'] as $key => $row)
                        <div class="col-md-6 mb-4">
                            <a href="{{ route('site.services.show', ['id' => $row->id]) }}" class="Live-Event-Management">
                                <div class="service-box d-flex align-items-center justify-content-between hover-box">
                                    <h4 class="ml-3">{{ $row->title }}</h4>
                                    <img src="{{ asset(\App\Support\SitePresentation::servicePath($row->image, $loop->index)) }}" class="img-fluid" alt="{{ $row->title }}">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="container" style="text-align: center;">Services Not Found's !!</p>
                @endif
                <div class="d-flex justify-content-center py-4" style="gap: 20px;">
                    <!--<div class="">-->
                    <!--    <a href="{{ route('site.request-quote') }}" class=" request-quote-box">Request Quote</a>-->
                    <!--</div>-->
                    <div class="">
                        <a href="{{ route('site.contact') }}" class="  lern-more-box">Learn More <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- services end -->




    <section class="news-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 py-3">
                    @if (isset($data['category'][0]))
                        <h1 class="text-dark">{{ $data['category'][0]->title }}</h1>
                    @endif
                </div>
                <div class="col-6 text-right py-3">
                    <p class="view-all text-dark"><a
                            href="{{ route('site.category.show', ['id' => $data['category'][0]->id]) }}">View All</a></p>
                </div>

                @if (isset($data['category'][0]))
                    @if (isset($data['cat_post_' . $data['category'][0]->title]))
                        @foreach ($data['cat_post_' . $data['category'][0]->title] as $row)
                            <div class="col-md-4 blog-card">
                                <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                    <div class="blog1">
                                        <div class="blog2">
                                            <img src="{{ asset(\App\Support\SitePresentation::blogPath($row->thumbs, $row->title, $loop->index)) }}" alt="{{ $row->title }}">
                                        </div>
                                        <div class="blog-card-body py-2">
                                            <a class="text-dark"
                                                href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">{{ $row->title }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>Post Not Found's !!</p>
                    @endif
                @else
                    <p>Post Not Found's !!</p>
                @endif
            </div>


        </div>
    </section>
    {{--
    <section class="blog-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 py-3">
                    @if (isset($data['category'][1]))
                        <h1 class="text-white">{{ $data['category'][1]->title }}</h1>
                    @endif
                </div>
                <div class="col-6 text-right py-3">
                    <p class="view-all"><a
                            href="{{ route('site.category.show', ['id' => $data['category'][1]->id]) }}">View All</a></p>
                </div>
                @if (isset($data['category'][1]))
                    @if (isset($data['cat_post_' . $data['category'][1]->title]))
                        @foreach ($data['cat_post_' . $data['category'][1]->title] as $row)
                            <div class="col-md-4 blog-card py-2">
                                <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                    <div class="blog1">
                                        <div class="blog2">
                                            <img src="{{ asset(\App\Support\SitePresentation::blogPath($row->thumbs, $row->title, $loop->index)) }}" alt="{{ $row->title }}">
                                        </div>
                                        <div class="blog-card-body py-2">
                                            <a
                                                href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">{{ $row->title }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>Post Not Found's !!</p>
                    @endif
                @else
                    <p>Post Not Found's !!</p>
                @endif
            </div>


        </div>
    </section>
    --}}
     {{--
     <section class="news-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-6 py-3">
                    @if (isset($data['category'][2]))
                        <h1 class="text-dark">{{ $data['category'][2]->title }}</h1>
                    @endif
                </div>
                <div class="col-6 text-right py-3">
                    <p class="view-all text-dark"><a
                            href="{{ route('site.category.show', ['id' => $data['category'][2]->id]) }}">View All</a></p>
                </div>

                @if (isset($data['category'][2]))
                    @if (isset($data['cat_post_' . $data['category'][2]->title]))
                        @foreach ($data['cat_post_' . $data['category'][2]->title] as $row)
                            <div class="col-md-4 blog-card">
                                <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                    <div class="blog1">
                                        <div class="blog2">
                                            <img src="{{ asset(\App\Support\SitePresentation::blogPath($row->thumbs, $row->title, $loop->index)) }}" alt="{{ $row->title }}">
                                        </div>
                                        <div class="blog-card-body py-2">
                                            <a class="text-dark"
                                                href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">{{ $row->title }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>Post Not Found's !!</p>
                    @endif
                @else
                    <p>Post Not Found's !!</p>
                @endif
            </div>


        </div>
    </section>
    --}}
    
    {{--

    <section style="background-color: #edf2fa;">
        <div class="container py-5">
            <div class="row">
                <div class="text-center py-3">
                    <h2 class="text-dark">Client Testimonials</h2>
                    <p class="text-dark">Nehan Tech Solution: Where Quality Meets Professionalism!</p>
                </div>
                @if (isset($data['testimonial']) && count($data['testimonial']) > 0)
                    @foreach ($data['testimonial'] as $row)
                        <div class="col-lg-4 col-md-4">
                            <div class="">
                                <div class="Testimonials">
                                    <p class="text-dark">       {{ \Illuminate\Support\Str::words($row->description, 100, '...') }}</p>
                                </div>
                                <div class="d-flex gap-3 align-items-center">
                                    @if (isset($row->image))
                                        <img src="{{ asset($row->image) }}"
                                            style="width: 60px; height: 60px; border-radius: 100%;">
                                    @else
                                        @if (isset($all_view['setting']->logo))
                                            <img src="{{ asset($all_view['setting']->logo) }}"
                                                style="width: 60px; height: 60px; border-radius: 100%;">
                                        @else
                                            <p>Thumbnail Not Found's !</p>
                                        @endif
                                    @endif
                                    <h5 class="text-dark">{{ $row->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Testimonials Not Found's !</p>
                @endif

            </div>
        </div>
    </section>
    --}}
    @php
        use App\Models\Brand;
        $brands = Brand::all(); // Fetch brands directly in view
    @endphp
    
    {{--
    <section class="brand-section py-lg-4 py-3"
        style="background: linear-gradient(to bottom, #031150, #9d671c);">
        <div class="container">
             <div class="text-center py-3">
                    <h2 class="text-white ">Our Trusted Partner</h2>
                <p class="text-white">We proudly serve clients who believe in quality, innovation, and long-term professional partnerships.</p>

                </div>
            <div class="brand-slider d-flex align-items-center">
                <div class="brand-track d-flex align-items-center">
                    <!-- First Pass (Actual Brands) -->
                    @foreach ($brands as $brand)
                        <div class="brand-item text-center mx-4">
                            @if ($brand->image)
                            <a href="{{ $brand->url }}" target="_blank"> <img src="{{ asset($brand->image) }}" class="brand-logo" alt="{{ $brand->title }}" ></a>
                               
                            @else
                                <div class="brand-logo-placeholder" style="width: auto; height: 60px; background: #ccc;">
                                </div>
                            @endif

                        </div>
                    @endforeach

                    <!-- Second Pass (Duplicates for smooth loop) -->
                    @foreach ($brands as $brand)
                        <div class="brand-item text-center mx-4">
                            @if ($brand->image)
                                <img src="{{ asset($brand->image) }}" class="brand-logo" alt="{{ $brand->title }}">
                            @else
                                <div class="brand-logo-placeholder" style="width: auto; height: 60px; background: #ccc;">
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    --}}
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.querySelector("#slider ul");
            const slides = document.querySelectorAll("#slider ul li");
            let index = 0;

            function moveRight() {
                index = (index + 1) % slides.length;
                slider.style.transform = `translateX(-${index * 100}%)`;
            }

            function moveLeft() {
                index = (index - 1 + slides.length) % slides.length;
                slider.style.transform = `translateX(-${index * 100}%)`;
            }

            document.querySelector(".control_next").addEventListener("click", moveRight);
            document.querySelector(".control_prev").addEventListener("click", moveLeft);

            setInterval(moveRight, 19000); // Automatic sliding
        });
    </script>
    <script src="{{ asset('assets/site/plugin/lightjs/lightbox-plus-jquery.js') }}"></script>
@endsection
