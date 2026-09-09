@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/site/plugin/lightbox/lightbox.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/site/flickity-docs/docs/flickity.min.css')}}">
<style>
    .carousel {
        background: #EEE;
        overflow: hidden;
    }

    .carousel-cell {
        width: 30%;
        height: 110px;
        margin-right: 10px;

        background: #8C8;
        border-radius: 5px;

    }

    @media only screen and (max-width: 600px) {
        .carousel-cell {
            width: 30%;
            height: 60px;
            margin-right: 10px;

            background: #8C8;
            border-radius: 5px;

        }
    }

    /* cell number */
    .carousel-cell:before {
        display: block;
        text-align: center;

        line-height: 110px;

        color: white;
    }

    .our-services {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.50), rgba(0, 0, 0, 0.50)), url(./image/LED-Screen-6.PNG) no-repeat center center;
        background-size: cover;
        position: relative;
        height: 300px;
    }
    .splide__pagination {
        display: none;
    }
    .flickity-viewport{
        background-color:#212529;
    }
    .splide__list{
        height:100px;
    }
    .img-h-sp{
        height:100px;
    }
     @media only screen and (max-width: 576px) {
        .splide__list{
            height:55px;
        }
        .img-h-sp{
            height:auto;
        }
    }
    
</style>
@endsection
@section('content')
<section class="our-services" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.0)), url({{ asset('assets/site/image/LED-Screen-6.PNG')}}) no-repeat center center;
        background-size: cover;
        position: relative;
        height: 300px;">
    <div class="container">
        <div class="text-white py-3">
            <p class="py-4">Services</p>
            <h1 class="">Our Services </h1>
            <p class="lead">Discover the range of professional sound services we offer.</p>
        </div>
    </div>
</section>
<section style="background-color: #171717;">
    <div class="container py-2">
        <div class="row">
            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(0,1) as $key => $row)
            <!--<div class="col-lg-6 ">-->
            <!--    <div class="bg-danger w-100">-->
            <!--        <p class="">-->
            <!--            <a class="btn text-white" id="collapseButton" role="button">-->
            <!--                <i id="collapseIcon" class="bi bi-plus-lg">{{$row->title }}</i>-->
            <!--            </a>-->
            <!--        </p>-->
            <!--        <div class="collapse " id="collapseExample">-->
            <!--            <div class="card card-body text-dark bg-dark">-->
            <!--                <div id="splide" class="splide">-->
            <!--                    <div class="splide__track">-->
            <!--                        <ul class="splide__list" >-->

            <!--                            <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>-->
            <!--                            @foreach($data['files'] as $f)-->
            <!--                            <li class="splide__slide">-->
            <!--                                <div>-->
            <!--                                    <div class="px-2">-->
            <!--                                        <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">-->
            <!--                                            <img class="w-100 img-h-sp" src="{{ asset($f->file)}}" -->
            <!--                                            >-->
            <!--                                        </a>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </li>-->
            <!--                            @endforeach-->

            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->

            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
             <div class="col-lg-6 d-flex gap-3">
                <div class=" bg-danger w-100">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton100" role="button">
                            <i id="collapseIcon100" class="bi bi-plus-lg"> {{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample100"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3500 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>
                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach
                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742027962_919553680_3.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            
            
            
            @endforeach
            @endif
   
            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(1,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 ">
                <div class=" bg-danger w-100">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton1" role="button">
                            <i id="collapseIcon1" class="bi bi-plus-lg"> {{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample1"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3500 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>
                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach
                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742028585_241710069_A3.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
             
            </div>
            @endforeach
            @endif

            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(2,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton2" role="button">
                            <i id="collapseIcon2" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample2"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3600 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>
                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach


                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742029698_1320858005_S10.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif

            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(3,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton3" role="button">
                            <i id="collapseIcon3" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample3"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3700 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>
                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach


                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742030293_628092886_C6.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif

            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(4,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton4" role="button">
                            <i id="collapseIcon4" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample4"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3800 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>

                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach


                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742031128_1852698884_V7.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif

            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(5,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton5" role="button">
                            <i id="collapseIcon5" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample5"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3900 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>

                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach

                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742031625_692042889_P1.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif
            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(6,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton6" role="button">
                            <i id="collapseIcon6" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample6"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3900 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>

                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach

                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742031625_1530879205_P2.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif
            @if($data['rows'] && !empty($data['rows']))
            @foreach($data['rows']->slice(7,1) as $key => $row)
            <div class="col-lg-6 d-flex gap-3 py-2">
                <div class=" bg-danger w-100 ">
                    <p>
                        <a href="{{ route('site.services.show', ['id' => $row->id])}}" class="btn text-white" id="collapseButton7" role="button">
                            <i id="collapseIcon7" class="bi bi-plus-lg">{{$row->title }}</i> <!-- Starts as plus icon -->
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample7"> <!-- Starts closed -->
                        <div class="card card-body text-dark bg-dark">
                            <div class="carousel" data-flickity='{ "autoPlay": 3900 }'>
                                <?php $data['files'] = App\Models\File::where('service_id', $row->id)->get(); ?>
                                @foreach($data['files'] as $f)
                                <div class="carousel-cell">
                                    <a href="{{ asset($f->file)}}" data-lightbox="models" data-title="caption1" class="glightbox">
                                        <img class="w-100" src="{{ asset($f->file)}}">
                                    </a>
                                </div>
                                @endforeach
                                <!-- Repeat other cells -->
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="image-card-services">
                   <img src="https://www.namastesound.com/upload_file/services/images/1742032051_647022816_A5.jpg" alt="Description of the image" width="80" height="40" class="object-fit-contant">
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample');
        var collapseIcon = document.getElementById('collapseIcon');
        var collapseButton = document.getElementById('collapseButton');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample100');
        
        var collapseIcon = document.getElementById('collapseIcon100');
        var collapseButton = document.getElementById('collapseButton100');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
      
        var collapseElement = document.getElementById('collapseExample1');
        var collapseIcon = document.getElementById('collapseIcon1');
        var collapseButton = document.getElementById('collapseButton1');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample2');
        var collapseIcon = document.getElementById('collapseIcon2');
        var collapseButton = document.getElementById('collapseButton2');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample3');
        var collapseIcon = document.getElementById('collapseIcon3');
        var collapseButton = document.getElementById('collapseButton3');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample4');
        var collapseIcon = document.getElementById('collapseIcon4');
        var collapseButton = document.getElementById('collapseButton4');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample5');
        var collapseIcon = document.getElementById('collapseIcon5');
        var collapseButton = document.getElementById('collapseButton5');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample6');
        var collapseIcon = document.getElementById('collapseIcon6');
        var collapseButton = document.getElementById('collapseButton6');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var collapseElement = document.getElementById('collapseExample7');
        var collapseIcon = document.getElementById('collapseIcon7');
        var collapseButton = document.getElementById('collapseButton7');

        // Check screen size and open the collapse on desktop
        if (window.innerWidth >= 992) { // 992px and above is considered desktop
            collapseElement.classList.add('show'); // Start open on desktop
        } else {
            collapseIcon.classList.remove('bi-dash-lg');
            collapseIcon.classList.add('bi-plus-lg'); // Start with plus icon on mobile
        }

        collapseButton.addEventListener('click', function() {
            // Toggle the collapse manually
            if (collapseElement.classList.contains('show')) {
                // If content is currently shown, hide it
                collapseElement.classList.remove('show');
                collapseIcon.classList.remove('bi-dash-lg');
                collapseIcon.classList.add('bi-plus-lg'); // Change to plus icon
            } else {
                // If content is currently hidden, show it
                collapseElement.classList.add('show');
                collapseIcon.classList.remove('bi-plus-lg');
                collapseIcon.classList.add('bi-dash-lg'); // Change to minus icon
            }
        });
    });

    // document.addEventListener('DOMContentLoaded', function() {
    //     var splide = new Splide('.splide', {
    //         type: 'loop',
    //         perPage: 3,
    //         perMove: 1,
    //         dots: false,
    //     });

    //     splide.mount();
    // });
    document.addEventListener('DOMContentLoaded', function() {
    var splide = new Splide('.splide', {
        // type       : 'loop',
        perPage    : 3,
        perMove    : 1,
        dots       : false,
        autoplay  : false,  // Disable autoplay
    });

    splide.mount();
});

</script>
<script src="{{ asset('assets/site/plugin/lightjs/lightbox-plus-jquery.js')}}"></script>
<script src="{{ asset('assets/site/flickity-docs/docs//flickity.pkgd.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

@endsection