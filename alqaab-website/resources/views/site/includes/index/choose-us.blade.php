<div class="dreamit-choose-us-area pt-100 pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- <div class="dreamit-bar-thumb">
						<img src="assets/images/spape.png" alt="">
					</div> -->
                <div class="dreamit-section-title pb-30">
                    <div class="dreamit-section-sub-title">
                        @if(isset($data['featured_pages'][1]))
                        <h5> {!! $data['featured_pages'][1]->title !!}</h5>
                        @endif
                    </div>

                    <div class="dreamit-content-text-inner">
                        @if(isset($data['featured_pages'][1]))
                        <p>{!! ($data['featured_pages'][1]->description) !!}</p>
                        @endif
                    </div>
                    <!-- <div class="about-button mt-45">
							<a href="#"> Read More</a>
						</div> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dreamit-choose-us-thumb tilt-effect">
                    @if(isset($data['featured_pages'][1]))
                    <img src="{{ asset($data['featured_pages'][1]->thumbs)}}" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pl-2">
                <div class="dreamit-choose-us-content d-flex pt-30">
                    <div class="dreamit-choose-us-icon">
                        <i class="flaticon-24-hours-3"></i>
                    </div>
                    <div class="choose-us-title">
                        <h2>24/7 Unlimited Support</h2>
                        <div class="dreamit-content-text">
                            <p>Experience peace of mind with our 24/7 unlimited support, ensuring you have dedicated workers whenever you need it.</p>
                        </div>
                    </div>
                </div>
                <div class="dreamit-choose-us-content d-flex">
                    <div class="dreamit-choose-us-icon">
                        <i class="flaticon-reward"></i>
                    </div>
                    <div class="choose-us-title">
                        <h2>Jobs to your Satisfaction</h2>
                        <div class="dreamit-content-text">
                            <p>Choose us for jobs executed to your satisfaction, where our unwavering commitment ensures every task is completed with precision and excellence, meeting and exceeding your expectations.</p>
                        </div>
                    </div>
                </div>
                <div class="dreamit-choose-us-content d-flex">
                    <div class="dreamit-choose-us-icon">
                        <i class="flaticon-agreement"></i>
                    </div>
                    <div class="choose-us-title">
                        <h2>We Are Committed</h2>
                        <div class="dreamit-content-text">
                            <p>We are committed to being your preferred choice by delivering unwavering dedication, exceptional service, and a steadfast commitment to your satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>