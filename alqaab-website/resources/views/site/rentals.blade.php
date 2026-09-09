@extends('site.layouts.app')
@section('title', 'rentals')
@section('css')
    <!--<link-->
    <!--      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"-->
    <!--      rel="stylesheet"-->
    <!--      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"-->
    <!--      crossorigin="anonymous"-->
    <!--    />-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/site/plugin/lightbox/viewbox.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html,
        body {
            scroll-behavior: auto !important;
        }

        #section1 {
            padding-top: 0px;
            height: 100%;
            color: #fff;
            background-color: #00021D;
        }

        #section2 {
            padding-top: 50px;
            height: 100%;
            color: #fff;
            background-color: #00021D;
        }

        #section3 {
            padding-top: 50px;
            height: 100%;
            color: #fff;
            background-color: #00021D;
        }

        #section4 {
            padding-top: 50px;
            height: 100%;
            color: #fff;
            background-color: #00021D;

        }

        #section5 {
            padding-top: 50px;
            height: 100%;
            color: #fff;
            background-color: #00021D;
        }

        #section6 {
            padding-top: 50px;
            height: 100%;
            color: #fff;
            background-color: #00021D;
        }

        pre.prettyprint.prettyprinted {
            padding: 10px 20px;
            border: 1px solid #ccc;
            margin: 0 0 40px;
        }

        dl {
            display: block;
            margin: 5px 0 20px;
            overflow: hidden;
        }

        dl>dt {
            display: block;
            clear: left;
            float: left;
            min-width: 160px;
        }

        dl>dd {
            display: block;
            float: left;
            margin: 0 0 20px 10px;
        }

        /* .custom-container {
        justify-content: center;
    }  */

        .header-centered {
            background: linear-gradient(to bottom,
                    rgba(219, 45, 45, 0.8),
                    rgba(0, 0, 0, 0.8)),
                url(./image/LED-Screen-6.webp) no-repeat center center;
            background-size: cover;
            position: relative;
            height: 100%;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* .container {
            width: 90%;
            margin: 0 auto;
          } */

        .content-wrapper {
            margin-bottom: 20px;
        }

        h3 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        /* p {
            font-size: 1rem;
            line-height: 1.5;
            max-width: 800px;
            margin: 0 auto;
          } */

        .icon-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .img-height-part {
            height: 350px;
        }

        .img-height-part-h {
            height: 254px;
        }

        .rental-title-f p {
            font-size: 18px;
        }

        .icon-container img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
        }

        .sound-img-part {
            width: 60px;
            height: 60px;
        }

        li.d-flex.rental-title-f {
            font-size: 10px;
        }

        li.d-flex.rental-title-f p {
            margin-top: -6px;
        }

        @media only screen and (max-width: 768px) {
            .icon-container {
                gap: 80px;
            }
        }

        .icon-container a {
            text-decoration: none;
            color: #fff;
            width: 120px;
        }

        .icon-container img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
        }

        .icon-label {
            margin-top: 5px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            h3 {
                font-size: 1.5rem;
            }

            /* p {
              font-size: 0.9rem;
            } */

            .icon-container a {
                width: 100px;
            }

            .icon-container img {
                width: 100%;
            }

            .icon-label {
                font-size: 0.9rem;
            }

            .img-height-part {
                height: auto;
            }

            .img-height-part-h {
                height: auto;
            }

        }

        @media (max-width: 480px) {
            h3 {
                font-size: 1.2rem;
            }

            .spiker {
                left: -100px;
            }

            /* p {
              font-size: 0.8rem;
            } */

            /* .icon-container {
              flex-direction: column;
              align-items: center;
            } */

            .icon-container a {
                width: 80px;
            }

            .icon-label {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 390px) {

            .spiker {
                left: -100px;
            }

            .rental-wrapper {
                width: 100%;
                padding-left: 163px;
                text-align: left;
            }
        }

        .text-section ul {
            list-style: none;
            font-size: 1.5rem;
        }

        .rentail-section-a {
            background: linear-gradient(to bottom, #c51026, #00021D);
            padding: 60px 0;
        }

        .search {
            width: 100%;
            position: relative;
            display: flex;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #00b4cc;
            border-right: none;
            padding: 5px;
            height: 30px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9dbfaf;
        }

        .searchTerm:focus {
            color: #00b4cc;
        }

        .rental-title-f {
            display: flex;
            gap: 10px;
        }

        .searchButton {
            width: 40px;
            height: 30px;
            border: 1px solid #00b4cc;
            background: #00b4cc;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap {
            width: 100%;
            /* position: absolute; */
            /* top: 50%;
      left: 50%; */
            /* transform: translate(-50%, -50%); */
        }

        @media (max-width: 992px) {

            .rental-wrapper {
                width: 100%;

                padding-left: 200px;
                text-align: left;
            }

            .rental-wrapper p {

                text-align: left !important;
            }

            .icon-container {
                display: flex;
                justify-content: end;
                flex-wrap: wrap;
                gap: 20px;
                padding-left: 153px;
                /* background: red; */
            }

            .icon-container a {

                width: 106px;
            }

            .icon-container img {
                width: 70px;
                height: 70px;
                border-radius: 8px;
            }
        }

        @media (max-width: 991.98px) {

            .navbar-expand-lg>.container,
            .navbar-expand-lg>.container-fluid,
            .navbar-expand-lg>.container-lg,
            .navbar-expand-lg>.container-md,
            .navbar-expand-lg>.container-sm,
            .navbar-expand-lg>.container-xl {
                padding-right: 15px;
                padding-left: 15px;
            }

            .viewbox-container {
                position: fixed;
                top: 0% !important;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgb(0 2 31 / 85%) !important;
                z-index: 9999;
            }
        }

        @media (max-width: 768px) {

            .spiker {

                top: 0px;

            }
        }

        @media (max-width: 576px) {

            .spiker {
                left: -76px;
                top: -28px;
                height: 350px;
            }

            .icon-container {

                padding-left: 0px;
                justify-content: center;

            }

            .rental-wrapper {

                padding-left: 162px;

            }

            .icon-container {

                margin-top: 70px;
            }

        }

        @media (max-width: 480px) {

            .icon-container {

                margin-top: 0px;
            }


        }

        @media (max-width: 390px) {

            .spiker {
                left: 0px;
                top: 0px;
                height: 330px;
                position: relative;

            }

            .rental-wrapper {
                padding-left: 0px;
                text-align: center
            }

            .rental-wrapper p {

                text-align: center !important;
            }

        }

        .go-top-btn {
               position: fixed;
            bottom: 84px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #F44336;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 20px;
            opacity: 0;
            visibility: hidden;
            /* transition: all 0.3s ease; */
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .go-top-btn:hover {
            background-color: #555;
        }

        .go-top-btn.visible {
            opacity: 1;
            visibility: visible;
        }
    </style>
@endsection
@section('content')

    <header id="header" class="header-centered"
        style="background: linear-gradient(to bottom, rgba(219, 45, 45, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset('assets/site/image/LED-Screen-6.webp') }}) no-repeat center center;background-size: cover;position: relative;height: 100%;color: #fff;text-align: center;padding: 20px 0;">
        <img class="spiker" src="{{ asset('assets/site/static/photoroom.png') }}" alt="spiker">
        <div class="container">
            <div class="content-wrapper rental-wrapper">
                <h3 style="font-weight: bold;">RENTALS </h3>
                <p style="font-size:14px;text-align:center;">
                    Explore our extensive selection boasting Sounds, Lights, LED
                    Screens, and Stage Equipment spanning from timeless classics to
                    cutting-edge innovations. Discover the ideal stage for your event
                    alongside top-notch Audio Visual equipment tailored for your
                    presentation needs. Trust our seasoned team to curate, deliver,
                    install, and manage your event seamlessly, providing expert support
                    every step of the way.
                </p>
            </div>
            {{-- <div class="icon-container" style="justify-content:center;">
            <a href="#section1">
                <img src="{{ asset('assets/site/image/1.png')}}" alt="Sounds Icon" />
                <div class="icon-label" style="font-weight: bold;">Sounds </div>
            </a>
            <a href="#section6">
                <img src="{{ asset('assets/site/image/2.png')}}" alt="Lights Icon" />
                <div class="icon-label" style="font-weight: bold;">Microphone </div>
            </a>
            <a href="#section2">
                <img src="{{ asset('assets/site/image/2.png')}}" alt="Lights Icon" />
                <div class="icon-label" style="font-weight: bold;">Lights </div>
            </a>
            <a href="#section3">
                <img src="{{ asset('assets/site/image/3.png')}}" alt="LED Video Wall Icon" />
                <div class="icon-label" style="font-weight: bold;">LED Video Wall</div>
            </a>
             <a href="#section5">
                <img src="{{ asset('assets/site/image/2.png')}}" alt="Lights Icon" />
                <div class="icon-label" style="font-weight: bold;">Backline </div>
            </a>
            <a href="#section4">
                <img src="{{ asset('assets/site/image/4.png')}}" alt="Stage Icon" />
                <div class="icon-label" style="font-weight: bold;">Stage</div>
            </a>
        </div> --}}
            <div class="icon-container" style="justify-content:center;">
                @php
                    $rentalCategories = \App\Models\RentalCategory::where('status', 1)->orderBy('order')->get();
                @endphp

                @foreach ($rentalCategories as $index => $category)
                    <a href="#section{{ $index + 1 }}">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($category->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="{{ $category->title }} Icon" />
                        <div class="icon-label" style="font-weight: bold;">{{ $category->title }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    {{-- <section id="section1" class="">
    <div class="sound-image rentail-section-a" style=" text-align: center; ">
        @if (isset($data['category'][0]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][0])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][0]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 id="page1" style="font-weight: bold;">@if (isset($data['category'][0])) {{ $data['category'][0]->title }} @endif</h4>
    </div>
    <div class="container ">
        <div class="text-center">
            <p>@if (isset($data['category'][0])) {{ $data['category'][0]->description }} @endif</p>
        </div>
        @if (isset($data['category'][0]))
        @if (isset($data['cat_post_' . $data['category'][0]->title]))
        @foreach ($data['cat_post_' . $data['category'][0]->title] as $row)
        <div class="row mt-lg-5 mt-3">
            <div class="col-md-6 col-ms-6">
                <div>
                    @if (isset($row->thumbs) && !empty($row->thumbs))
                    <img class="w-50" src="{{ asset(\App\Support\SitePresentation::imagePath($row->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                    @else
                    <p>
                        Image Not Found's !
                    </p>
                    @endif
                </div>
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->orderBy('id', 'asc')->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach

                </div>

            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>

</section>

<section id="section2">
    <div class="rentail-section-a" style="text-align: center;">
        @if (isset($data['category'][1]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][1])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][1]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 style="font-weight: bold;">@if (isset($data['category'][1])) {{ $data['category'][1]->title }} @endif</h4>
    </div>
    <div class="container">
        <div class="text-center">
            <p>@if (isset($data['category'][1])) {{ $data['category'][1]->description }} @endif</p>
        </div>
        @if (isset($data['category'][1]))
        @if (isset($data['cat_post_' . $data['category'][1]->title]))
        @foreach ($data['cat_post_' . $data['category'][1]->title] as $row)
        <div class="row">
            <div class="col-md-6 col-ms-6">
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>
</section>

<section id="section3" class="">
    <div class="sound-image rentail-section-a" style=" text-align: center; ">
        @if (isset($data['category'][2]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][2])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][2]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 id="page1" style="font-weight: bold;">@if (isset($data['category'][2])) {{ $data['category'][2]->title }} @endif</h4>
    </div>
    <div class="container ">
        <div class="text-center">
            <p>@if (isset($data['category'][2])) {{ $data['category'][2]->description }} @endif</p>
        </div>
        @if (isset($data['category'][4]))
        @if (isset($data['cat_post_' . $data['category'][2]->title]))
        @foreach ($data['cat_post_' . $data['category'][2]->title] as $row)
        <div class="row mt-lg-5 mt-3">
            <div class="col-md-6 col-ms-6">
                <div>
                    @if (isset($row->thumbs) && !empty($row->thumbs))
                    <img class="w-50" src="{{ asset(\App\Support\SitePresentation::imagePath($row->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                    @else
                    <p>
                        Image Not Found's !
                    </p>
                    @endif
                </div>
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->orderBy('id', 'asc')->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach

                </div>

            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>

</section>

<section id="section4">
    <div class="rentail-section-a" style="text-align: center;">
        @if (isset($data['category'][3]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][3])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][3]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 style="font-weight: bold;">@if (isset($data['category'][3])) {{ $data['category'][3]->title }} @endif</h4>
    </div>
    <div class="container">
        <div class="text-center">
            <p>@if (isset($data['category'][3])) {{ $data['category'][3]->description }} @endif</p>
        </div>
        @if (isset($data['category'][3]))
        @if (isset($data['cat_post_' . $data['category'][3]->title]))
        @foreach ($data['cat_post_' . $data['category'][3]->title] as $row)
        <div class="row">
            <div class="col-md-6 col-ms-6">
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>
</section>


<section id="section5" class="">
    <div class="sound-image rentail-section-a" style=" text-align: center; ">
        @if (isset($data['category'][4]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][4])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][4]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 id="page1" style="font-weight: bold;">@if (isset($data['category'][4])) {{ $data['category'][4]->title }} @endif</h4>
    </div>
    <div class="container ">
        <div class="text-center">
            <p>@if (isset($data['category'][4])) {{ $data['category'][4]->description }} @endif</p>
        </div>
        @if (isset($data['category'][4]))
        @if (isset($data['cat_post_' . $data['category'][4]->title]))
        @foreach ($data['cat_post_' . $data['category'][4]->title] as $row)
        <div class="row mt-lg-5 mt-3">
            <div class="col-md-6 col-ms-6">
                <div>
                    @if (isset($row->thumbs) && !empty($row->thumbs))
                    <img class="w-50" src="{{ asset(\App\Support\SitePresentation::imagePath($row->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                    @else
                    <p>
                        Image Not Found's !
                    </p>
                    @endif
                </div>
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->orderBy('id', 'asc')->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach

                </div>

            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>

</section>

<section id="section6" class="">
    <div class="sound-image rentail-section-a" style=" text-align: center; ">
        @if (isset($data['category'][5]->thumbs))
        <img class="sound-img-part" src="@if (isset($data['category'][5])) {{ asset(\App\Support\SitePresentation::imagePath($data['category'][5]->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }} @endif">
        @else
        <p>
            Image Not Found's !
        </p>
        @endif
        <h4 id="page1" style="font-weight: bold;">@if (isset($data['category'][5])) {{ $data['category'][5]->title }} @endif</h4>
    </div>
    <div class="container ">
        <div class="text-center">
            <p>@if (isset($data['category'][5])) {{ $data['category'][5]->description }} @endif</p>
        </div>
        @if (isset($data['category'][5]))
        @if (isset($data['cat_post_' . $data['category'][5]->title]))
        @foreach ($data['cat_post_' . $data['category'][5]->title] as $row)
        <div class="row mt-lg-5 mt-3">
            <div class="col-md-6 col-ms-6">
                <div>
                    @if (isset($row->thumbs) && !empty($row->thumbs))
                    <img class="w-50" src="{{ asset(\App\Support\SitePresentation::imagePath($row->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                    @else
                    <p>
                        Image Not Found's !
                    </p>
                    @endif
                </div>
                <div class="text-section">
                    <ul>
                        <?php
                        $model = new App\Models\File();
                        $rental_file = $model->where('rental_unique_id', $row->rental_unique_id)->orderBy('id', 'asc')->get();
                        ?>
                        @foreach ($rental_file as $row)
                        <li class="d-flex rental-title-f">🔴
                            <p>
                                {{ $row->title }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-ms-6">
                <div>
                    @foreach ($rental_file as $row)
                    <a href="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="San Francisco">
                        <img src="{{ asset(\App\Support\SitePresentation::imagePath($row->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt="" class="img-fluid img-height-part mb-lg-5 mb-3">
                    </a>
                    @endforeach

                </div>

            </div>
        </div>
        @endforeach
        @else
        <p>Post Not Found's !!</p>
        @endif
        @else
        <p>Post Not Found's !!</p>
        @endif
    </div>

</section> --}}
  @php
        use App\Models\Brand;
        $brands = Brand::all(); // Fetch brands directly in view
    @endphp

    <section class="brand-section py-4" style="background: linear-gradient(to bottom, #c51026, #00021D); overflow: hidden;">
        <div class="container">
            <div class="brand-slider d-flex align-items-center">
                <div class="brand-track d-flex align-items-center">
                    <!-- First Pass (Actual Brands) -->
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
    @php
        $categories = $data['category'] ?? [];
    @endphp

    @foreach ($categories as $index => $category)
        <section id="section{{ $index + 1 }}" class="">
            <div class="sound-image rentail-section-a" style="text-align: center;">
                @if (isset($category->thumbs))
                    <img class="sound-img-part" src="{{ asset(\App\Support\SitePresentation::imagePath($category->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                @else
                    <p>Image Not Found!</p>
                @endif
                <h4 style="font-weight: bold;">{{ $category->title ?? 'Untitled' }}</h4>
            </div>

            <div class="container">
                <div class="text-center">
                    <p>{{ $category->description ?? '' }}</p>
                </div>

                @php
                    $catPosts = $data['cat_post_' . $category->title] ?? null;
                @endphp

                @if ($catPosts && count($catPosts))
                    @foreach ($catPosts as $row)
                        <div class="row mt-lg-5 mt-3">
                            <div class="col-md-6 col-ms-6">
                                <div>
                                    @if (isset($row->thumbs) && !empty($row->thumbs))
                                        <img class="w-50" src="{{ asset(\App\Support\SitePresentation::imagePath($row->thumbs, 'assets/site/image/1.-Midas-M32-Live.webp')) }}">
                                    @else
                                        <!--<p>Image Not Found!</p>-->
                                    @endif
                                </div>
                                <div class="text-section">
                                    <ul>
                                        @php
                                            $rental_file = app('App\Models\File')
                                                ->where('rental_unique_id', $row->rental_unique_id)
                                                ->orderBy('id', 'asc')
                                                ->get();
                                        @endphp

                                        @foreach ($rental_file as $file)
                                            <li class="d-flex rental-title-f">🔴
                                                <p>{{ $file->title }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6 col-ms-6">
                                <div>
                                    @foreach ($rental_file as $file)
                                        <a href="{{ asset(\App\Support\SitePresentation::imagePath($file->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" class="thumbnail" title="{{ $file->title }}">
                                            <img src="{{ asset(\App\Support\SitePresentation::imagePath($file->file, 'assets/site/image/1.-Midas-M32-Live.webp')) }}" alt=""
                                                class="img-fluid img-height-part mb-lg-5 mb-3">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Post Not Found!</p>
                @endif
            </div>
        </section>
    @endforeach

  
    <button id="goTopBtn" class="go-top-btn" title="Go to top">↑</button>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="{{ asset('assets/site/plugin/lightjs/jquery.viewbox.min.js') }}"></script>

    <script>
        $(function() {
            $('.thumbnail').viewbox();
            $('.thumbnail-2').viewbox({
                fullscreenButton: true
            });
            (function() {
                var vb = $('.popup-link').viewbox();
                $('.popup-open-button').click(function() {
                    vb.trigger('viewbox.open');
                });
                $('.close-button').click(function() {
                    vb.trigger('viewbox.close');
                });
            })();
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
  const goTopBtn = document.getElementById('goTopBtn');
  
  // Show/hide button based on scroll position
  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      goTopBtn.classList.add('visible');
    } else {
      goTopBtn.classList.remove('visible');
    }
  });
  
  // Smooth scroll to top
  goTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
    //   behavior: 'smooth'
    });
  });
});
</script>
@endsection
