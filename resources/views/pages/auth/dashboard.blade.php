@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">

        @include('layouts.navbar')

        @include('layouts.breadcrumb', ['title' => 'About Us', 'subtitle' => 'About'])

    </div>

    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <img src="{{ asset('public/assets/images/about-2.png') }}" class="img-fluid rounded w-100"
                            alt="">

                        <div class="" style="position: absolute; top: -15px; right: -15px;">
                            <img src="{{ asset('public/assets/images/about-3.png') }}" class="img-fluid"
                                style="width: 150px; height: 150px; opacity: 0.7;" alt="">
                        </div>
                        <div class="" style="position: absolute; top: -20px; left: 10px; transform: rotate(90deg);">
                            <img src="{{ asset('public/assets/images/about-4.png') }}" class="img-fluid"
                                style="width: 100px; height: 150px; opacity: 0.9;" alt="">
                        </div>
                        <div class="rounded-bottom">
                            <img src="{{ asset('public/assets/images/about-5.jpg') }}"
                                class="img-fluid rounded-bottom w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
