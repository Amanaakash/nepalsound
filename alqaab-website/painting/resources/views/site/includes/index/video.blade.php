<section class="py-5">
    <div class="container col-md-12 mb-5 box-shadow py-5">
        <!-- <div class="title-section">
            <h1>
                <span>भिडियो ग्यालरी</span>
            </h1>
            <div class="nav">
                <a href="{{route('site.video')}}" class="prev btn-link">
                    <span>सबै हेर्नुहोस्</span>
                </a>
            </div>
        </div> -->
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('assets/site/img/colar persionl.png')}}" class="img-fluid" alt="Left Image">
            </div>
            <div class="col-8 text-center">
                <h2>भिडियो ग्यालरी</h2>
            </div>
            <div class="col-2">
                <img src="{{ asset('assets/site/img/COLER PERSION 2.png')}}" class="img-fluid" alt="Right Image">
            </div>
        </div>
        <div class="post--items post--items-4">
            <ul class="nav row">
                @if(isset($data['video']) && $data['video']->count() > 0)
                @foreach($data['video'] as $row)
                <li class="col-sm-6 col-md-4">
                    <div class="post--item post--layout-1 post--type-video post--title-large">
                        <div class="post--img">
                            <iframe src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" width="100%" height="200px" frameborder="0" allowfullscreen=""></iframe>
                            <p>{{$row->video_title}}</p>
                        </div>
                        <hr class="divider hidden-md hidden-lg" style="position: fixed;" />
                    </div>
                </li>
                @endforeach
                @else
                <p>Video Not Found's !</p>
                @endif

            </ul>
        </div>
        <div class="text-center py-3">
            <a href="{{ route('site.video')}}">
                <button class="btn btn-dark">सबै हेर्नुहोस्</button>
            </a>
        </div>
    </div>
</section>