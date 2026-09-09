<div class="dreamit-service-area pt-110 pb-70" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dreamit-section-title style-two">
                    <div class="dreamit-bar-thumb">
                        <img src="assets/images/spape.png" alt="">
                    </div>
                    <div class="dreamit-section-sub-title">
                        <h5>_ What we do? _</h5>
                    </div>
                    <div class="dreamit-section-main-title pb-30">
                        <h3 class="text-black">We work many fields to clean </h3>
                        <h2>your surrounding area</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-15">
            @if(isset($data['post']))
            @foreach($data['post'] as $row)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dreamit-single-service-box">
                    <div class="dreamit-service-thumb">
                        <img class="service-img-height" src="{{asset($row->thumbs)}}" alt="">
                    </div>
                    <div class="svg-img">
                        <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 367 67">
                            <path d="M0.5,57L184,0,367.5,57H0.5Z"></path>
                            <path d="M-34.5,68L149,11,332.5,68h-367Z"></path>
                            <path d="M39.5,69L223,12,406.5,69H39.5Z"></path>
                        </svg>
                        <svg class="svg-gray" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 368 57">
                            <g>
                                <path d="M0.5,57L184,0,368,57H0.5Z"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="dreamit-service-shape">
                        <i class="fas fa-boxes fa-lg service-custom-fa-icon"></i>

                        <!-- <img src="assets/images/service-3.png" alt=""> -->
                    </div>
                    <div class="service-content">
                        <div class="service-title">
                            <h2>{!! $row->title !!}</h2>
                        </div>
                        <div class="service-content-text">
                            <p>{!! mb_strimwidth($row->short_description, 0, 300, "...") !!}</p>
                        </div>
                        <div class="dreamit-service-button">
                            <a href="{{ route('site.post.show', ['slug' => $row->slug]) }}">read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>