<div class="header-top-menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-top-address">
                    <ul>
                        @if($all_view['setting']->site_email)
                        <li><a href="mailto:{{ ($all_view['setting']->site_email) }}"><i class="far fa-envelope"></i>
                                {{ ($all_view['setting']->site_email) }}</a></li>
                        @endif
                        @if($all_view['setting']->site_first_address)
                        <li><span><i class="fas fa-map-marker-alt"></i> {{ ($all_view['setting']->site_first_address) }} {{ ($all_view['setting']->site_second_address) }}</span>
                        </li>
                        @endif
                        @if($all_view['setting']->site_phone)
                        <li><a href="tel: {{ ($all_view['setting']->site_phone) }}"><i class="fas fa-phone"></i> {{ ($all_view['setting']->site_phone) }}</a></li>
                        @endif
                        @if($all_view['setting']->site_mobile)
                        <li><a href="tel: {{ ($all_view['setting']->site_mobile) }}"><i class="fas fa-phone"></i> {{ ($all_view['setting']->site_mobile) }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hrader-top-social text-right">
                    <a href="{{ asset($all_view['setting']->social_profile_fb) }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ asset($all_view['setting']->social_profile_insta) }}"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>