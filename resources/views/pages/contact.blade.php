@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', ['title' => 'Contact Us', 'subtitle' => 'Contact'])
    </div>

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h5 class="text-primary mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Address</h5>
                        <p class="mb-0">123 Example Street, New York, NY, USA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h5 class="text-primary mb-2"><i class="bi bi-envelope-fill me-2"></i>Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h5 class="text-primary mb-2"><i class="bi bi-telephone-fill me-2"></i>Phone</h5>
                        <p class="mb-0">+1 234 567 8900</p>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-xl-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="bg-light p-5 rounded h-100">
                            <h4 class="text-primary">Send Your Message</h4>
                            <h4 class="lh-base mb-4">Receive messages instantly with our PHP and Ajax contact form -
                                available in the <a href="https://htmlcodex.com/downloading/?item=3447">Pro Version</a>
                                only.
                            </h4>
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="name"
                                                value="{{ old('name') }}" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" name="email"
                                                id="email"value="{{ old('email') }}" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control border-0" name="phone_number"
                                                id="phone_number" value="{{ old('phone_number') }}"
                                                placeholder="Phone Number">
                                            <label for="phone_number">Your Phone</label>
                                        </div>
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="subject"
                                                id="subject" value="{{ old('subject') }}" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Leave a message here" name="message" id="message"
                                                style="height: 160px">{{ old('message') }}</textarea>
                                            <label for="message">Message</label>
                                        </div>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3">Send Message</button>
                                    </div>
                                </div>
                            </form>
                            @session('success')
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    <strong>Success!</strong> Your action has been completed successfully.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endsession
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="rounded h-100">
                        <iframe class="rounded h-100 w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
