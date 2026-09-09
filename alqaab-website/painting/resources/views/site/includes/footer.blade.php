<style>
    a:hover {
        color: red !important;
    }
</style>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6867b98dbe8a1b1910b83017/1ivaipkm2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<footer class="footer text-white text-center text-md-start">
    <div class="container">
        <div class="row ">
            <!-- Logo and Description -->
            <div class="col-lg-4 col-md-12 footer-logo">
                @if( isset($all_view['setting']->logo) )
                <a href="{{ route('site.index')}}">
                    <img src="{{ asset($all_view['setting']->logo) }}" alt="Logo">
                </a>
                @endif
                <div class="footer-description">
                    <p>
                        @if(isset($all_view['common']->footer_first_description))
                        {!! $all_view['common']->footer_first_description !!}
                        @endif </p>
                </div>
            </div>

         
             @php
                use App\Models\Services;
                $footerServices = Services::orderBy('id', 'desc')->get();
            @endphp

            <div class="col-lg-4 col-md-6 footer-services text-start px-md-0 px-5">
                @if (isset($all_view['common']->footer_second_title))
                    <h5 class="mt-lg-4">{{ $all_view['common']->footer_second_title }}</h5>
                @endif

                <ul class="list-unstyled">
                    @forelse($footerServices as $service)
                        <li>
                            <a href="{{ route('site.services.show', ['id' => $service->id]) }}">
                                {{ $service->title }}
                            </a>
                        </li>
                    @empty
                        <li>No services found!</li>
                    @endforelse
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 footer-contact ">
                <div>
                    @if(isset($all_view['common']->footer_third_title))
                    <h5 class="mt-lg-4">{{ $all_view['common']->footer_third_title }}</h5>
                    @endif
                    <div class="d-flex">
                        <span class="fotter-icon-main px-2">
                            <a href="">
                                <i class="bi bi-envelope-at-fill"></i>
                            </a>
                        </span>
                        <p class="px-2">Email: @if(isset($all_view['setting']->site_email)) <a href="mailto:{{ $all_view['setting']->site_email }}">{{ $all_view['setting']->site_email }} </a> @endif </p>
                    </div>
                    <div class="d-flex">
                        <span class="fotter-icon-main ">
                            <a href="">
                                <i class="bi bi-phone-fill"></i>
                            </a>
                        </span>
                        <p class="px-2">Mobile: @if(isset($all_view['setting']->site_mobile)) <a href="tel:{{ $all_view['setting']->site_mobile }}">{{ $all_view['setting']->site_mobile }}</a> @endif</p>
                    </div>
                    <div class="d-flex">
                        <span class="fotter-icon-main px-2">
                            <a href="">
                                <i class="bi bi-geo-alt-fill "></i>
                            </a>
                        </span>
                        <p class="px-2">Address: <a href="https://maps.app.goo.gl/FpsBLr424GwRdWAP9"> @if(isset($all_view['setting']->site_first_address))
                                {{ $all_view['setting']->site_first_address }}
                                @endif
                                @if(isset($all_view['setting']->site_second_address))
                                {{ $all_view['setting']->site_second_address }}
                                @endif</a></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="social-icons justify-content-center text-center">
            <a class="footer-icon-main-a" href="{{ $all_view['setting']->social_profile_fb }}"><i class="bi bi-facebook"></i></a>
            <a class="footer-icon-main-a" href="{{ $all_view['setting']->social_profile_insta }}"><i class="bi bi-instagram"></i></a>
            <a class="footer-icon-main-a" href="{{ $all_view['setting']->social_profile_tiktok }}"><i class="bi bi-tiktok"></i></a>
            <a class="footer-icon-main-a" href="{{ $all_view['setting']->social_profile_youtube }}"><i class="bi bi-youtube"></i></a>
            <a class="footer-icon-main-a" href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>Copyright &copy {{ date('Y') }}, @if(isset($all_view['setting']->site_name)) {{ $all_view['setting']->site_name }} @endif , All right Reserved</p>
        </div>
    </div>
</footer>