@extends('site.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-container {

            /* margin: 50px auto; */
            background-color: #1a1a1a;
            align-items: center;

            justify-content: center;

            border-radius: 10px;
        }

        .form-control,
        .form-select {
            background-color: #e7e5e5;
            color: #000;
            border: none;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #e9e4e4;
            box-shadow: none;
        }

        label {
            color: #fff;
        }

        .submit-btn {
            background-color: #f00;
            border: none;
        }

        .submit-btn:hover {
            background-color: #c00;
        }

        .our-blog-red {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(./image/LED-Screen-6.webp) no-repeat center center;
            background-size: cover;
            position: relative;
            height: 100%;
        }

        .telephone {
            text-decoration: none;
        }

        .telephone p {
            font-weight: 700;
            font-size: 18px;
            color: white;
        }

        .environmental {
            text-decoration: none;
        }

        .environmental p {
            font-weight: 700;
            font-size: 18px;
            color: white;
        }
    </style>
@endsection
@section('content')
   {{-- Success Alert --}}
   
    <section class="our-blog-red"
        style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset('assets/site/image/LED-Screen-6.webp') }}) no-repeat center center;
        background-size: cover;
        position: relative;
        height: 300px;">
        <div class="container">
             @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
            <div class="text-white py-3 text-center">
                <h1 class="">REQUEST A QUOTE</h1>
                <p class="py-4">
                    Please fill out our request form, and we will get in touch with you
                    within one business day.
                </p>
                <span>
                    <a href="" class="telephone">
                        <p>
                            <i class="bi bi-telephone-fill px-2 text-danger"></i>If you have
                            any questions, feel free to call us at 9803827775
                        </p>
                    </a>
                    <a href="" class="environmental">
                        <p>
                            <i class="bi bi-envelope px-2 text-danger"></i>Email us at
                            info@namastesound.com.np
                        </p>
                    </a>
                </span>
            </div>
        </div>
    </section>
    <section style="background-color: #000000">
        <div class="container py-4">
            <div class="form-container  p-lg-0 p-4">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="full_name" class="form-control"
                                placeholder="Full Name" required />
                        </div>
                        <div class="col-md-6">
                            <label for="companyName">Client/Company Name</label>
                            <input type="text" id="companyName" name="company_name" class="form-control"
                                placeholder="Client/Company Name" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="text" id="phoneNumber" name="phone_number" class="form-control"
                                placeholder="Phone Number" required />
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" id="emailAddress" name="email" class="form-control"
                                placeholder="Email Address" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject"
                            required />
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="eventStartDate">Event Start Date</label>
                            <input type="date" id="eventStartDate" name="event_start_date" class="form-control"
                                required />
                        </div>
                        <div class="col-md-6">
                            <label for="eventEndDate">Event End Date</label>
                            <input type="date" id="eventEndDate" name="event_end_date" class="form-control" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="eventVenue">Where is the Event?</label>
                        <input type="text" id="eventVenue" name="event_venue" class="form-control" placeholder="Venue"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription">In a few words, describe your event</label>
                        <input type="text" id="eventDescription" name="event_description" class="form-control"
                            placeholder="Annual Conference" required />
                    </div>
                    <div class="mb-3">
                        <label for="estimated_attendance">Estimated Attendance</label>
                        <select id="estimated_attendance" name="estimated_attendance" class="form-select">
                            <option selected disabled>Select</option>
                            <option value="50-100">50-100</option>
                            <option value="100-200">100-200</option>
                            <option value="200-500">200-500</option>
                            <option value="500+">500+</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="needs">Describe your needs</label>
                        <textarea id="needs" name="needs" class="form-control" rows="4"
                            placeholder="E.g., Need a sound system with 3 wireless microphones." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rider">Attach Rider/RFP (PDF, Word, or Images)</label>
                        <input type="file" id="rider" name="rider" class="form-control" />
                        <small class="text-white">Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (Max 2MB)</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary text-white">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
