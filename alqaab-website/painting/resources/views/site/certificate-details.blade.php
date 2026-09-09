@extends('site.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        
        .certificate-image {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            border: 0px solid #fff;
            border-radius: 8px;
        }
        
        .related-certificate {
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        
        .related-certificate:hover {
            transform: translateY(-5px);
        }
        
        .related-certificate img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
    <link href="{{ asset('assets/site/lightgallery/dist/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/site/lightgallery/dist/css/lg-fb-comment-box.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="news-blog"
        style="background: linear-gradient(to bottom, rgba(145, 138, 138, 0), rgba(0, 0, 0, 0)), url('{{ $data['certificate']->image ? asset($data['certificate']->imagth) : 'https://www.namastesound.com/upload_file/blog/1742532519_1145250463_11.JPG' }}') no-repeat center center;background-size: cover;position: relative;height: 250px;">
        <div class="container">
            <div class="justify-content-center">
                <div class="d-flex justify-content-center py-5"></div>
                <div class="text-center text-white">
                    <h2>{{ $data['certificate']->title }}</h2>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #00021D;">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8">
                    <div id="lightgallery">
                        <a href="{{ $data['certificate']->image ? asset($data['certificate']->image) : asset('assets/site/images/default-certificate.jpg') }}">
                            <img class="certificate-image" 
                                 src="{{ $data['certificate']->image ? asset($data['certificate']->image) : asset('assets/site/images/default-certificate.jpg') }}" 
                                 alt="{{ $data['certificate']->title }}">
                        </a>
                    </div>
                    <div class="py-4 text-container-main text-white">
                        {!! $data['certificate']->short_description !!}
                    </div>
                </div>
                <div class="col-lg-4 py-2">
                    <div class="post-container">
                        <h3 class="text-white">Related Certificates</h3>
                        
                        @foreach($data['relatedCertificates'] as $related)
                        <div class="related-certificate">
                            <a href="{{ route('site.certificate.show', $related->id) }}">
                                <img src="{{ $related->imagth ? asset($related->imagth) : ($related->image ? asset($related->image) : asset('assets/site/images/default-certificate-thumb.jpg')) }}" 
                                     alt="{{ $related->title }}">
                            </a>
                            <div class="text-white mt-2">
                                <h6>{{ Str::limit($related->title, 30) }}</h6>
                                <p>{{ Str::limit(strip_tags($related->short_description), 100) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Most Visited Links Section -->
                    @if(isset($data['most_visited_links']))
                    <div class="mt-5">
                        <h3 class="text-white">Most Visited</h3>
                        <ul class="list-unstyled">
                            @foreach($data['most_visited_links'] as $link)
                            <li class="mb-2">
                                <a href="{{ $link->url }}" class="text-white">{{ $link->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('assets/site/lightgallery/dist/js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('assets/site/lightgallery/lib/jquery.mousewheel.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#lightgallery').lightGallery({
                selector: 'a',
                download: false,
                share: false
            });
        });
    </script>
@endsection