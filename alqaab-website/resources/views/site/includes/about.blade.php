@if(isset($data['featured_pages'][0]))
<div class="dreamit-about-area pt-95 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 ">
                <div class="dreamit-about-thumb tilt-effect">
                    <img class="tilt-effect" src="{{ asset($data['featured_pages'][0]->thumbs)}}" alt="">
                </div>
                <div class="dreamit-single-about-counter alltuchtopdown ">
                    <div class="about-counter-text-inner">
                        <h1><span class="counter">10</span> <span>+</span></h1>
                        <div class="about-counter-title">
                            <h3>Years Experience</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pl-35">
                <div class="dreamit-bar-thumb">
                    <img src="assets/images/spape.png" alt="">
                </div>

                <div class="dreamit-section-title pb-30">
                    @if(isset($data['featured_pages'][0]))
                    <div class="dreamit-section-sub-title">
                        <h5>{!! $data['featured_pages'][0]->title !!}</h5>
                    </div>
                    @endif
                    @if(isset($data['featured_pages'][0]))
                    <div class="dreamit-section-text mt-15">
                        <p>{!! ($data['featured_pages'][0]->description) !!}</p>
                    </div>
                    @endif
                    <div class="about-button mt-20">
                        <a href="#">More Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif