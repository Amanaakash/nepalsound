@extends('site.layouts.app')
@section('css')
<style>
    .bg {
        background-color: #FF0000;
    }

    a {
        text-decoration: none;
        color: white;
    }

    .list-unstyled li:hover {
        transform: translateY(-2px);
    }

    .list-unstyled i {
        font-size: 30px;
        /* Adjust the font size as needed */
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

    .img-fluid {
        box-shadow: 0px 9px 15px 0px rgba(14, 14, 14, 0.2);
        transition: box-shadow 0.3s ease-in-out;
        border-radius: 3%;
        border-bottom-left-radius: 3%;
    }

    .container-fuild {
        background-color: #EEE9D7;
        /* Your background color */
        padding: 20px;
    }

    ul.flex {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    ul.flex li {
        margin: 0 10px;
        /* Adjust spacing between list items */
        text-align: center;
    }

    ul.flex li a {
        display: block;
        text-decoration: none;
        color: #333;
        /* Link color */
    }

    a.rounded-circle:hover {
        transform: scale(1.1);
        /* Make the icon slightly larger on hover */
        transition: transform 0.3s ease;
    }

    .shadow {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Add shadow to the icons */
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
</style>
@endsection
@section('content')
<div class="container-fuild maintext">
    <ul class="flex">
        <li>
            <a href="{{ route('site.index')}}">
                <i class="bi bi-house-door-fill">Home</i>
            </a>
        </li>
        <li>
            <a href="">
                {{ $data['single']->title }}
            </a>
        </li>
    </ul>
</div>
<div class="container">
    <h2> {{ $data['single']->title }} </h2>

    <div class="row">
        <!-- Main Content Area -->
        <div class="col-md-9 col-sm-8">
            <div>
                <img class="w-50 img-fluid" src="{{ asset($data['single']->thumbs)}}" alt="Cover of my books" style="border-radius: 1%;">
            </div>
            <div class="container-fluid">
                <p class="fs-6">{!! $data['single']->short_description !!} </p>
                @if(count($data['file']) != 0)
                <div class="row bg-dark text-white fw-bold fs-6">
                    <div class="col-md-4 border py-2">
                        Title
                    </div>
                    <div class="col-md-4 border py-2">
                        Download Count
                    </div>
                    <div class="col-md-4 border py-2">
                        View & Download
                    </div>
                </div>
                <!-- ====================== -->
                @foreach($data['file'] as $row)
                <div class="row fs-6">
                    <div class="col-md-4 border py-2">
                        {{ $row->title }}
                    </div>
                    <div class="col-md-4 border py-2">
                        {{ $row->download_count }}
                    </div>
                    <div class="col-md-4 border py-2">
                        <button type="button" class="px-2 py-1 rounded bg-primary text-white">
                            <a href="{{ asset( $row->file) }}" target="_blank" class="text-white text-decoration-none">View</a>
                        </button>
                        <button type="button" class="px-2 py-1 rounded bg-success text-white">
                            <a href="{{ asset( $row->file) }}" download target="_self" class="text-white text-decoration-none">Download</a>
                        </button>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- ============= -->
                @if(count($data['file']) != 0)
                <object data="{{ asset( $row->file) }}#view=Fit" type="application/pdf" width="100%" height="1190">
                    <p>Your Mobile Cannot read PDF. <a rel="external" href="{{ asset( $row->file) }}">Click to download</a></p>
                </object>
                @endif
            </div>
            <div class="comment--list pd--30-0">
                    <!-- Post Items Title Start -->
                    <div class="post--items-title">
                        <h2 class="h4">टिप्पणीहरू</h2>

                        <i class="icon fas fa-comments-o"></i>
                    </div>
                    <!-- Post Items Title End -->

                    <ul class="comment--items nav">
                        <div class="fb-comments" data-href="{{ route('site.book.show', ['post_unique_id'=> $data['single']->post_unique_id]) }}" data-width="100%" data-numposts="5"></div>
                    </ul>
                </div>
        </div>
        <!-- Sidebar Area -->
        <div class="col-md-3 col-sm-4 " style="max-height: 100vh; overflow-y: auto;">
            <div class="row">
                <div class="card col-12 shadow bg-white rounded mb-4">
                    <img src="./img/Rajneetisangai-RajKaj-Book-165x250.jpg" class="w-100 img-fluid" style="height: 350px;" alt="Book Cover">
                    <div class="card-body text-center">
                        <a href="" class="text-decoration-none text-black">
                            <p>Published in 2021, the book is a collection of column-essays revolving around the idea of Welfare Democracy, which is explained in length and is proposed.</p>
                        </a>
                    </div>
                </div>
                <div class="card col-12 shadow bg-white rounded mb-4">
                    <img src="./img/Rajneetisangai-RajKaj-Book-165x250.jpg" class="w-100 img-fluid" style="height: 350px;" alt="Book Cover">
                    <div class="card-body text-center">
                        <a href="" class="text-decoration-none text-black">
                            <p>Published in 2021, the book is a collection of column-essays revolving around the idea of Welfare Democracy, which is explained in length and is proposed.</p>
                        </a>
                    </div>
                </div>
                <div class="card col-12 shadow bg-white rounded mb-4">
                    <img src="./img/Rajneetisangai-RajKaj-Book-165x250.jpg" class="w-100 img-fluid" style="height: 350px;" alt="Book Cover">
                    <div class="card-body text-center">
                        <a href="" class="text-decoration-none text-black">
                            <p>Published in 2021, the book is a collection of column-essays revolving around the idea of Welfare Democracy, which is explained in length and is proposed.</p>
                        </a>
                    </div>
                </div>
                <div class="card col-12 shadow bg-white rounded mb-4">
                    <img src="./img/Rajneetisangai-RajKaj-Book-165x250.jpg" class="w-100 img-fluid" style="height: 350px;" alt="Book Cover">
                    <div class="card-body text-center">
                        <a href="" class="text-decoration-none text-black">
                            <p>Published in 2021, the book is a collection of column-essays revolving around the idea of Welfare Democracy, which is explained in length and is proposed.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection