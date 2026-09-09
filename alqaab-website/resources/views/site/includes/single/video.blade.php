<div class="brand_area pt-35 pb-80 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="partner_main_title">
                    <h3>Our Video <span>Testimonial</span></h3>
                </div>
                <div class="row">
                    <div class="testimonial_list owl-carousel curosel-style">
                        @if($data['video'])
                        @foreach($data['video'] as $row)
                        <div class="data_science_video white-color video-bg">
                            <div class="data_science_video_inner wow fadeInUp" data-wow-delay="0.5s">
                                <a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://youtu.be/EjBArCv1OUw">
                                    <i class="fa fa-play"></i>
                                    <iframe src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" width="100%" height="200px" frameborder="0" allowfullscreen=""></iframe>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>Data not found !</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>