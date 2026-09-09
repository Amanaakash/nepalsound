<div class="contact_area style-three pt-90 pb-85" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dreamit-section-title style-two pb-30">
                    <div class="dreamit-bar-thumb">
                        <img src="assets/images/spape.png" alt="">
                    </div>
                    <div class="dreamit-section-sub-title">
                        <h5>Get In Touch</h5>
                    </div>
                    <div class="dreamit-section-main-title pb-30">
                        <h3 class="text-black">We want to share our</h3>
                        <h2>location to find <span>us easily.</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="contact_from style-two">
                    <form action="{{route('site.message')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_box mb-3">
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-3">
                                    <input class="form-control validate-input" type="email" id="email" name="email" placeholder="Email Address" value="{{old('email')}}">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box mb-3">
                                    <input class="form-control validate-input" type="tel" id="phone" name="number" placeholder="Phone Number" minlength="10" value="{{old('number')}}">
                                    @error('number')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_box">
                                    <div class="form-group">
                                        <select id="select-services" name="subject" class="form-control  validate-select">
                                            <option selected value="">Select a service required</option>
                                            <option value="Warehouse Workers">Warehouse Workers</option>
                                            <option value="Warehouse Workers">Pickers</option>
                                            <option value="Warehouse Workers">Processing Workers</option>
                                            <option value="Warehouse Workers">Food Processing Workers</option>
                                            <option value="Warehouse Workers">Meat Factory Workers</option>
                                            <option value="Public Area Workers">Public Area Workers</option>
                                            <option value="Kitchen Cleaning">Kitchen Cleaning</option>
                                            <option value="Glass Cleaning">Glass Cleaning</option>
                                            <option value="House Keeping">House Keeping</option>
                                            <option value="School Cleaning">School Cleaning</option>
                                            <option value="Hotel Cleaning">Hotel Cleaning</option>
                                        </select>
                                    </div>
                                    @error('subject')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_box mb-1">
                                    <textarea class="form-control validate-input" name="message" id="message" cols="30" rows="5" placeholder="Your Message " value="">{{old('message')}}</textarea>
                                    @error('message')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div id="email-status" class="form_box mt-1 text-center text-success">
                                </div>
                                <div class="quote_btn text_center pt-3">
                                    <button class="btn" id="btn-contact" type="submit">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="status"></div>
                </div>
            </div>
        </div>
        <div class="row pt-70">
            <div class="col-lg-4 col-md-6">
                <div class="dreamit-contact-content d-flex">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-title">
                        <h3>Office address</h3>
                        <div class="contact-content-text">
                            <p>>{{ $all_view['setting']->site_first_address }} , {{ $all_view['setting']->site_second_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dreamit-contact-content d-flex">
                    <div class="contact-icon">
                        <i class="fas fa-phone-slash"></i>
                    </div>
                    <div class="contact-title">
                        <h3>Telephone number</h3>
                        <div class="contact-content-text">
                            <a href="tel:+61433935071" style="color: #616161;">
                                <p>{{ $all_view['setting']->site_phone }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="dreamit-contact-content d-flex">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-title">
                        <h3>Mail address </h3>
                        <div class="contact-content-text">
                            <p><a href="mailto:{{ $all_view['setting']->site_email }}" style="color: #616161;">{{ $all_view['setting']->site_email }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>