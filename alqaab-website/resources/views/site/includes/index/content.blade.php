<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-4  mb-5">
                @if(isset($data['category'][0]))
                <a href="{{ route('site.category.show', ['id'=> $data['category'][0]->id]) }}">
                    <div class="image-container">
                        <img src="{{ asset($data['category'][0]->thumbs)}}" alt="Your Image" class="image">
                        <div class="text">
                            <h1>{{ $data['category'][0]->title }}</h1>
                        </div>
                    </div>
                </a>
                @endif
            </div>
            <div class="col-sm-4  mb-5">
                @if(isset($data['category'][1]))
                <a href="{{ route('site.category.show', ['id'=> $data['category'][1]->id]) }}">
                    <div class="image-container">
                        <img src="{{ asset($data['category'][1]->thumbs)}}" alt="Your Image" class="image">
                        <div class="text">
                            <h1>{{ $data['category'][1]->title }}</h1>
                        </div>
                    </div>
                </a>
                @endif
            </div>
            <div class="col-sm-4  mb-5">
                @if(isset($data['category'][2]))
                <a href="{{ route('site.book') }}">
                    <div class="image-container">
                        <img src="{{ asset($data['category'][2]->thumbs)}}" alt="Your Image" class="image">
                        <div class="text">
                            <h1>{{ $data['category'][2]->title }}</h1>
                        </div>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>