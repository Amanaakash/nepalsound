@extends('site.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .contact-card {
            transition: background-color 0.3s, color 0.3s;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            color: white;
            height: 190px;
        }

        .bg-dark-box {
            background-color: #000000;
        }

        .bg-dark-box:hover {
            background-color: #ff0000;
            color: white;
        }

        .bg-red {
            background-color: #ff0000;
        }

        .bg-red:hover {
            background-color: #343a40;
            color: white;
        }

        .contact-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        /* styles.css */
        .contact-container-card-image {
            font-family: Arial, sans-serif;
            background-color: #090909;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        .contact-container {
            display: flex;
            max-width: 900px;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
        }

        .form-container {
            flex: 1;
            margin-right: 20px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #fff;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            color: #fff;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }

        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff5722;
            color: #fff;
            cursor: pointer;
        }



        .map-container iframe {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            border: none;
        }

        .CONTACT-US-box {
            background: linear-gradient(to bottom, rgba(33, 83, 223, 0.8), rgba(0, 0, 0, 0.8)), url(./image/LED-Screen-6.webp) no-repeat center center;
            background-size: cover;
            position: relative;
            height: 300px;
        }

        .box-shadow-glass {

            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 5px 24px 9px rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 12px;
            padding: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="CONTACT-US-box d-flex align-items-center"
        style="background: linear-gradient(to bottom, rgba(33, 83, 223, 0), rgba(0, 0, 0, 0)), url({{ asset('assets/site/image/LED-Screen-6.PNG') }}) no-repeat center center; background-size: cover;position: relative;height: 500px;margin-top:-100px;">
        <div class="container">
            <div class="text-white py-3">
                {{-- <p class="py-4"> For inquiries, please contact us below</p> --}}
                <h1 class="">CONTACT US</h1>
                <p class="lead">For inquiries, please contact us below</p>
            </div>
        </div>
    </section>



<section class="contact-form-section py-5">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Form -->
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-4">Get in Touch</h2>
                <form action="{{ route('contactus.store') }}" method="POST" class="p-4 rounded shadow-lg bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required class="form-control">
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="form-control">
                        @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" rows="4" class="form-control">{{ old('message') }}</textarea>
                        @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Send Message</button>
                </form>
            </div>

            <!-- Map -->
            <div class="col-lg-6">
               
                   <div class="map-div w-100 overflow-hidden">
                     @if ($all_view['setting']->map)
                        {!! $all_view['setting']->map !!}
                    @else
                        <p class="text-muted">Map Not Found!</p>
                    @endif
                   </div>
                
            </div>

        </div>
    </div>
</section>
<section class="contact-info py-5" style="background: linear-gradient(135deg, #0A0A0B, #1A1A1D);">
    <div class="container">
        <div class="row text-center">

            <!-- Contact Card -->
            <div class="col-md-3 mb-4">
                <div class="contact-card p-4 rounded shadow-lg bg-dark text-light h-100">
                    <div class="contact-icon mb-3">
                        <span class="icon-circle  text-white">
                            <i class="bi bi-map"></i>
                        </span>
                    </div>
                    <h5 class="fw-bold">Office Location</h5>
                    <p class="small">
                        {{ $all_view['setting']->site_first_address ?? '' }}<br>
                        {{ $all_view['setting']->site_second_address ?? '' }}
                    </p>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-3 mb-4">
                <div class="contact-card p-4 rounded shadow-lg bg-danger text-light h-100">
                    <div class="contact-icon mb-3">
                        <span class="icon-circle  text-white">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                    </div>
                    <h5 class="fw-bold">Email Address</h5>
                    <p class="small">{{ $all_view['setting']->site_email }}</p>
                </div>
            </div>

            <!-- Work Hours -->
            <div class="col-md-3 mb-4">
                <div class="contact-card p-4 rounded shadow-lg bg-dark text-light h-100">
                    <div class="contact-icon mb-3">
                        <span class="icon-circle  text-white">
                            <i class="bi bi-clock"></i>
                        </span>
                    </div>
                    <h5 class="fw-bold">Work Hours</h5>
                    <p class="small">Sunday–Friday: 10am–5pm<br>Saturday: Closed</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-md-3 mb-4">
                <div class="contact-card p-4 rounded shadow-lg bg-danger text-light h-100">
                    <div class="contact-icon mb-3">
                        <span class="icon-circle text-white">
                            <i class="bi bi-phone-fill"></i>
                        </span>
                    </div>
                    <h5 class="fw-bold">Phone Numbers</h5>
                    <p class="small">
                        {{ $all_view['setting']->site_phone ?? '' }}<br>
                        {{ $all_view['setting']->site_mobile ?? '' }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Success Message Popup
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Error Messages Popup
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: `
                    <ul style="text-align:left;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                showConfirmButton: true
            });
        @endif
    </script>
@endsection
