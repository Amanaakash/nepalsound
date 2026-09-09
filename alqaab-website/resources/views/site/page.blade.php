@extends('site.layouts.app')

@section('content')
<div class="breatcome-area d-flex align-items-center" style="background-image: url({{ asset('assets/site/images/call-do.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breatcome-content text-center">
                    <div class="breatcome-content-title">
                        @if(isset($data['row']->title))
                        <h1 class="text-white">{!! $data['row']->title !!}</h1>
                        @endif
                    </div>
                    <div class="breatcome-content-text">
                        <ul>
                            <li><a href="{{ route('site.index')}}">Home </a> <i class="fas fa-chevron-right"></i> <span>{!! $data['row']->title !!}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!--Start about Area-->
<!--==================================================-->
<div class="dreamit-about-area style-three pt-100 pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 ">
                <div class="dreamit-about-thumb tilt-effect">
                    @if(isset($data['row']->thumbs ))
                    <img src="{{ asset($data['row']->thumbs)}}" alt="">
                    @endif
                </div>
                <div class="dreamit-single-about-counter">
                    <div class="about-counter-text-inner">
                        <h1><span class="counter">10</span> <span>+</span></h1>
                        <div class="about-counter-title">
                            <h3>Years Experience</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pl-40">


                <div class="dreamit-section-title pb-30">
                    <div class="dreamit-section-sub-title">
                        @if(isset($data['row']->title))
                        <h3 style="color: #fff;">{!! $data['row']->title !!}</h3><br>
                        @endif
                    </div>

                    <div class="dreamit-section-text mt-20">
                        <p>Our mission is not only to meet your expectations but to exceed them, we also provide many more like condos and apartment cleaning. Our unique 22-Step Healthy Touch Deep Cleaning System</p>
                    </div>

                    <div class="dreamit-about-content d-flex">
                        <div class="about-icon">
                            <i class="flaticon-checked"></i>
                        </div>
                        <div class="about-content-text">
                            <p>The housekeepers we hired are professionals who take pride in doing excellent work and in exceeding expectations.</p>
                        </div>
                    </div>
                    <div class="dreamit-about-content d-flex">
                        <div class="about-icon">
                            <i class="flaticon-checked"></i>
                        </div>
                        <div class="about-content-text">
                            <p>The housekeepers we hired are professionals who take pride in doing excellent work and in exceeding expectations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
@endsection
@section('js')

@endsection