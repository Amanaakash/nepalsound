<div class="testimonial-area pt-95 pb-80" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dreamit-section-title style-two">
                    <div class="dreamit-section-sub-title">
                        <h5 class="text-white">Reviews from our happiest Clients</h5>
                    </div>
                    <div class="dreamit-section-main-title pb-30">
                        <h3 class="text-white">The cleaner came within</h3>
                        <h2 class="text-white">the time frame.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-15">
            <div class="testimonials_list owl-carousel">
                @if(count($data['testimonial']) != 0)
                @foreach($data['testimonial'] as $key => $row)
                <div class="col-lg-12">
                    <div class="dreamit-single-testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="testimonial-content-text mt-1">
                                <p>
                                    {!! strlen($row->description) > 150 ? substr($row->description,0,150).'...' : $row->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dreamit-thumb-content d-flex align-items-center">
                        <div class="testimonial-thumb">
                            <img src="{{asset($row->image)}}" class="img img-responsive" alt="" width="100px;">
                        </div>
                        <div class="testimonial-title">
                            <h2>{{ $row->name }}</h2>
                            <span>{{ $row->position }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>