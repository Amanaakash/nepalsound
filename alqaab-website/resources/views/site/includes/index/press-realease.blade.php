<section>
    <div class="container py-3 shadow">
        <div class="headingtitle row align-items-center ">
            <div class="col-2 ">
                <img src="{{ asset('assets/site/img/colar persionl.png')}}" class="img-fluid" alt="Left Image">
            </div>
            <div class="col-8 text-center">
                @if(isset($data['category'][5]))
                <h2>{{ $data['category'][5]->title }}</h2>
                @endif
            </div>
            <div class="col-2">
                <img src="{{ asset('assets/site/img/COLER PERSION 2.png')}}" class="img-fluid" alt="Right Image">
            </div>
        </div>
        <div class="row py-3 ">
            @if(isset($data['category'][5]))
            @if(isset($data['cat_post_'.$data['category'][5]->title]))
            @foreach($data['cat_post_'.$data['category'][5]->title] as $row)
            <div class="col-sm-4 mb-3 shadow">
                <div class="card card-hover" style="height: 725px; min-height: 625px;">
                    <a href="{{ $row->url}}" class="thumbnail" target="_blank">
                        <div class="">
                            <img class="w-50 img img-responsive" src="{{ asset($row->thumbs_2)}}" height="50px">
                        </div>
                        <div class="card-body">
                            <img src="{{ asset($row->thumbs)}}" class="img-fluid img img-responsive img-rounded" style="height: 250px;">
                            <div class="caption text-dark">
                                <span>{{datenep($row->created_at, true)}} </span>
                                <div class="content py-5 text-dark">
                                    <h5 style="font-weight: bold; ">{{ $row->title }}</h5>
                                    <p> {!! mb_strimwidth($row->short_description, 0, 500, "...") !!}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            @endforeach
            @else
            <p>Post Not Found's !!</p>
            @endif
            @else
            <p>Category Not Found's !!</p>
            @endif
        </div>
        <div class="text-center py-3">
            <a href="{{ route('site.category.show', ['id'=> $data['category'][5]->id]) }}">
                <button class="btn btn-dark">सबै हेर्नुहोस्</button>
            </a>
        </div>
    </div>
</section>