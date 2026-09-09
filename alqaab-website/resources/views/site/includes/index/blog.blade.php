<section>
    <div class="container py-3">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('assets/site/img/colar persionl.png')}}" class="img-fluid" alt="Left Image">
            </div>
            <div class="col-8 text-center">
                @if(isset($data['category'][1]))
                <h2>{{ $data['category'][1]->title }}</h2>
                @endif
            </div>
            <div class="col-2">
                <img src="{{ asset('assets/site/img/COLER PERSION 2.png')}}" class="img-fluid" alt="Right Image">
            </div>
        </div>

        <hr />
        <div class="container">
            <div class="row">
                @if(isset($data['category'][1]))
                @if(isset($data['cat_post_'.$data['category'][1]->title]))
                @foreach($data['cat_post_'.$data['category'][1]->title] as $row)
                <div class="col-sm-4 col-md-4 mb-3">
                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}" target="_self">
                        <div class="d-flex align-items-end box-image" style="background-image: url({{ asset($row->thumbs)}});background-size: cover;background-position: center;height: 210px !important;flex: 1;right: 10px;border-radius: 5px;overflow: hidden;position: relative;">
                            <div class="px-3">
                                <a class="text-white">{{ date('M, Y, D', strtotime($row->created_at)) }}</a>
                                <br />
                                <a class="text-white" href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">{{ $row->title }}</a>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach
                @else
                <p>Post Not Found's !!</p>
                @endif
                @else
                <p>Category Not Found's !!</p>
                @endif
            </div>
        </div>

        <div class="text-center py-3">
            <a href="{{ route('site.category.show', ['id'=> $data['category'][1]->id]) }}">
                <button class="btn btn-dark">सबै हेर्नुहोस्</button>
            </a>
        </div>
    </div>
</section>