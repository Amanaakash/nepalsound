<section class="top vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner">
                    <img class="  shadow" src="{{ asset($data['banner']->image)}}" alt="Banner Image">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    आजको मिति {{ datenep(now()->toDateTimeString(), true) }}
                    @if(isset($data['banner']))
                    <h1 class="main">{{ $data['banner']->title }}</h1>

                    @if(isset($data['banner']))
                    <p>{{ $data['banner']->title_second }}</p>
                    @endif

                    <div class="social-icons">
                        <a href="@if( isset($all_view['setting']->social_profile_fb) ) {{ $all_view['setting']->social_profile_fb }}@endif" class="bi bi-facebook"></a>
                        <a href="@if( isset($all_view['setting']->social_profile_twitter) ) {{ $all_view['setting']->social_profile_twitter }}@endif" class="bi bi-twitter"></a>
                        <a href="@if( isset($all_view['setting']->social_profile_insta) ) {{ $all_view['setting']->social_profile_insta }}@endif" class="bi bi-instagram"></a>
                        <a href="@if( isset($all_view['setting']->social_profile_youtube) ) {{ $all_view['setting']->social_profile_youtube }}@endif" class="bi bi-youtube"></a>
                        <a href="@if( isset($all_view['setting']->social_profile_tiktok) ) {{ $all_view['setting']->social_profile_tiktok }}@endif" class="bi bi-tiktok"></a>

                    </div>
                    @if(isset($data['banner']))
                    <p style="color: #fff;">{!! $data['banner']->description !!}</p>
                    @endif
                </div>
            </div>
        </div>
        @else
        <p class="container" style="text-align: center;">Banner Not Found's !!</p>
        @endif
    </div>
</section>