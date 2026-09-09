<div class="dreamit-why-choose-area style-two pt-60 pb-190" id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 pl-70">
                <div class="dreamit-section-title pb-20">
                    <div class="dreamit-section-sub-title2">
                        <h5 class="text-white">Meet the driving force behind our success</h5>
                    </div>
                    <div class="dreamit-section-main-title">
                        <h2>Our Experienced Team</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 pl-0 pt-30">
                <div class="dreamit-choose-content">
                    <p>Meet the squad that turns cleaning into a comedy of grime-fighting superheroes – armed with mops and a sense of humor, we're here to wipe away your worries and leave your space sparkling with laughter!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!--Start dreamit choose us Area-->
<!--==================================================-->
<div class="dreamit-team-area">
    <div class="container">
        <div class="service-list owl-carousel row bd">
            @if(isset($data['client']))
            @foreach($data['client'] as $row)
            <div class="col-lg-12">
                <div class="dreamit-single-team-member">
                    <div class="dreamit-team-thumb">
                        <img src="{{ asset($row->image) }}" alt="" class="img img-responsive">
                        <div class="dreamit-team-social-icon">
                            <div class="dreamit-team-social-icon-inner">
                                <a href="{{ $row->link}}"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="dreamit-team-content">
                        <div class="dreamit-team-title">
                            <a href="#">
                                <h3>{{$row->name }}</h3>
                            </a>
                            <span>{{$row->clients_types}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>