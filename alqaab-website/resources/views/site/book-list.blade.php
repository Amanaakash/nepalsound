@extends('site.layouts.app')
@section('css')
<style>
    .a {
        background-color: aliceblue;
        height: 300px;

    }

    .maintext {
        margin-top: 20px;
        padding-top: 8%;
    }

    @media only screen and (max-width: 600px) {
        .maintext {
            margin-top: 18px;
            padding-top: 15%;
        }
    }

    .list-unstyled li:hover {
        transform: translateY(-2px);
    }

    .list-unstyled i {
        font-size: 25px;
        /* Adjust the font size as needed */
    }

    .img-fluid {
        box-shadow: 0px 9px 15px 0px rgba(14, 14, 14, 0.2);
        transition: box-shadow 0.3s ease-in-out;
        border-radius: 3%;
        border-bottom-left-radius: 3%;
    }

    .img-fluid:hover {
        box-shadow: 0px 20px 16px 0px rgba(13, 221, 10, 0.2);
    }

    .align-items-center {
        box-shadow: 0px 9px 15px 0px rgba(14, 14, 14, 0.2);
        transition: box-shadow 0.3s ease-in-out;
        border-radius: 3%;
        border-bottom-left-radius: 3%;
    }

    .align-items-center:hover {
        box-shadow: 0px 20px 16px 0px rgba(18, 18, 18, 0.2);
    }

    .w-100 {
        box-shadow: 0px 9px 15px 0px rgba(14, 14, 14, 0.2);
        transition: box-shadow 0.3s ease-in-out;
        border-radius: 3%;
        border-bottom-left-radius: 3%;
        height: 500px;
    }

    .w-100:hover {
        box-shadow: 0px 20px 16px 0px rgba(18, 18, 18, 0.2);
    }
</style>
@endsection
@section('content')
<section class="maintext">
    <div class="container">
       @if(isset($data['cover']) && !empty($data['cover']))
        <img class="w-100" src="{{ asset($data['cover']->thumbs) }}" style="border-radius: 1%;">
        @else
        <img class="w-100" src="{{ asset('assets/site/img/book.jpg') }}" style="border-radius: 1%;">
        @endif
        <h1 class="text-center">बुकहरु</h1>
    </div>
</section>
@if(isset($data['rows']) && !empty($data['rows']))
@foreach($data['rows'] as $row)
<section>
    <div class="container mb-5" style="background-color: aliceblue;">
        <div class="row align-items-center">

            <div class="col-md-4 text-center py-3">
                <a href="{{ route('site.book.show', ['post_unique_id'=> $row->post_unique_id ]) }}">
                    <img class="img-fluid" src="{{ asset($row->thumbs)}}" alt="Raajnitisangai Raajkaaj">
                </a>
            </div>
            <div class="col-md-8">
                <h1 class="py-3">{{ $row->title }}</h1>
                <p style="text-align: justify">{!! $row->short_description !!}</p>
            </div>

        </div>
    </div>
</section>
@endforeach
@else
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>बुकहरु फेला परेन !</h1>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Pagination -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $data['rows']->links() }}
            </div>
        </div>
    </div>


@endsection