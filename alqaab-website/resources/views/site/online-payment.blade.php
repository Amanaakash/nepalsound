@extends('site.layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body {
        background-color: #0a0c26;
        color: #fff;
    }

    .payment-section {
        padding: 50px;
        text-align: center;
    }

    .payment-logos img {
        max-width: 200px;
        margin: 10px;
    }

    .contact-btn {
        margin-top: 20px;
    }


    .form-section {
        padding: 30px;
    }

    .form-control,
    .btn {
        border-radius: 0.25rem;
    }

    .form-label {
        color: #f8f9fa;
    }

    .btn-submit {
        background-color: #ff4500;
        border: none;
    }
    section.form-group-online {
        background: #080034 !important;
    }
   
</style>
@endsection
@section('content')
<section style="background-color: #01011A;">
    <div class="container payment-section">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-start">
                <p>Online Payment</p>
                <h3>Online Payment</h3>
                <p>We have multiple payment methods available.</p>
                <a href="{{route('site.contact')}}" class="btn btn-danger contact-btn">
                    Still Facing Payment Issue? Click here to Contact Us ➞
                </a>
            </div>
            <div class="col-md-6 payment-logos">
                <img src="{{ asset('assets/site/image/eHostingServer-Payment-We-Accept.png')}}" alt="FonePay">

            </div>
        </div>
    </div>
</section>


<section class="form-group-online">
    <div class="container form-section">
        @if (Session::has('alert-success'))
        <div class="alert alert-success">{{ Session::get('alert-success') }} Message Sent Successfully !!
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        @if (Session::has('alert-danger'))
        <div class="alert alert-danger">{{ Session::get('alert-danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        <form method="POST" action="{{ route('site.onlinePaymentStore') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fullName" class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" id="fullName" value="{{ old('full_name') }}" placeholder="Full Name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="address" class="form-label">Address *</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Address" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="amount" class="form-label">Amount in NRs *</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" placeholder="Amount" required>
                </div>
                <div class="col-md-6">
                    <label for="fileUpload" class="form-label">Upload Deposit Slip *Screenshot</label>
                    <input type="file" class="form-control" id="fileUpload" name="screenshot" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks (Optional)</label>
                <textarea class="form-control" id="remarks" rows="3" name="remarks" placeholder="Remarks..."></textarea>
            </div>
            <button type="submit" class="btn btn-submit">Send Message</button>
        </form>
    </div>

</section>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').slideUp();
        }, 3000)
    });
</script>
@endsection
@section('js')

@endsection