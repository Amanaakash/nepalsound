@extends('site.layouts.app')
@section('title', 'about')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .flip-card {
            background-color: transparent;
            width: 100%;
            height: 100%;
            perspective: 1000px;
            cursor: pointer;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px 10px;
        }

        /* Front side (now contains the text/description) */
        .flip-card-front {
            background-color: #031150;
            color: #fff;
            transform: rotateY(0deg);
        }

        /* Back side (now contains the image) */
        .flip-card-back {
            background-color: transparent;
            transform: rotateY(180deg);
        }

        .flip-card-back img {
            width: 100%;
            height: 100%;
            object-fit: cover;
         
        }
    </style>
@endsection
@section('content')
    <section class="background-about-us"
        style="background: url({{ asset(\App\Support\SitePresentation::imagePath($data['featured_pages'][4]->thumbs, 'assets/site/image/home.jpg')) }}) no-repeat center center;background-size: cover; background-position: center;background-repeat: no-repeat;position: relative; z-index: 999;margin-top:-100px;">
        <div class="container">
            <div class="text-start">
                @if (isset($data['featured_pages'][4]))
                    <h2>{{ $data['featured_pages'][4]->title }}</h2>
                @endif
            </div>
            <div class="text-start">
                @if (isset($data['featured_pages'][4]))
                    <p class="Installation-text">{!! $data['featured_pages'][4]->short_description !!}</p>
                @endif

            </div>

        </div>
    </section>

    <section class="featured-gallery bg-white py-lg-5 py-3">
        <div class="container">
            <div class="row g-lg-5 g-3">
                {{-- Left Column: Text --}}
                <div class="col-md-6 col-lg-6">
                    <div class="featured-text">
                        @if (isset($data['featured_pages'][0]))
                            <h2 class="mb-4  ">{{ $data['featured_pages'][0]->title }} </h2>
                        @endif
                        @if (isset($data['featured_pages'][0]))
                            <p class="text-left-main-side text-center">{!! $data['featured_pages'][0]->short_description !!}</p>
                        @endif
                    </div>
                </div>

                {{-- Right Column: Gallery Images --}}
                <div class="col-md-6 col-lg-6">
                    <div class="row">
                        @if (isset($data['featured_pages'][0]))
                            <?php $data['files'] = App\Models\File::where('post_unique_id', $data['featured_pages'][0]->post_unique_id)->get(); ?>
                            @foreach ($data['files']->slice(0, 4) as $f)
                                @php
                                    $fileImage = asset(\App\Support\SitePresentation::blogPath($f->file, $f->title, $loop->index));
                                @endphp
                                <div class="col-6 mb-3">
                                    <a href="{{ $fileImage }}" data-lightbox="models" data-title="caption1"
                                        class="glightbox">
                                        <img src="{{ $fileImage }}" class="img-fluid rounded shadow-sm"
                                            alt="Featured Image">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>Files Not Found!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--
    <section class="meet-our-team bg-light py-5">
        <div class="container">
            <div class="text-center mb-lg-4 mb-3">
                <h2>Meet Our Team</h2>
            </div>

            <div class="row justify-content-center">
                @php
                    $teams = App\Models\OurTeam::where('status', 1)->orderBy('display_order')->get();
                @endphp

                @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="team-member text-center" style="height:300px;border:1px solid #000;">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <!-- Front side (now contains text/description) -->
                                    <div class="flip-card-front">
                                        <h5 class="member-name">{{ $team->title }}</h5>
                                        <p class="member-position">{{ $team->designation ?? 'Team Member' }}</p>
                                        <p class="member-description">{!! $team->short_description ?? '' !!}</p>
                                    </div>

                                    <!-- Back side (now contains the image) -->
                                    <div class="flip-card-back">
                                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($team->image, 'assets/site/image/logo.png')) }}" alt="{{ $team->title }}"
                                            class="team-img w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    --}}
@endsection

@section('js')
    <script>
        document.querySelectorAll('.flip-card').forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('flipped');
            });
        });
    </script>
@endsection
