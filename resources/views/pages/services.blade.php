@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">

        @include('layouts.navbar')

        @include('layouts.breadcrumb', ['title' => 'Service', 'subtitle' => 'Service'])

    </div>
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-5 mb-4">We Services provided best offer</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                    dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                @if (!empty($services))
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="service-item">
                                <div class="service-img">
                                    @if (!empty($service->banner_image))
                                        <img src="{{ asset('public/storage/' . $service->banner_image) }}"
                                            class="img-fluid rounded-top w-100" alt="{{ $service->title ?? '' }}">
                                    @endif
                                </div>
                                <div class="rounded-bottom p-4">
                                    <a href="#" class="h4 d-inline-block mb-4"> {{ $service->title ?? '' }}</a>
                                    <p class="mb-4">{{ $service->description ?? '' }}
                                    </p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4"
                                        href="{{ route('pages.service.details', Crypt::encrypt($service->id)) }}">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset('public/assets/images/service-1.jpg') }}"
                                    class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4"> Strategy Consulting</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                    Excepturi facilis neque nesciunt similique officiis veritatis,
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset('public/assets/images/service-2.jpg') }}"
                                    class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">Financial Advisory</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                    Excepturi facilis neque nesciunt similique officiis veritatis,
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ asset('public/assets/images/service-3.jpg') }}"
                                    class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="#" class="h4 d-inline-block mb-4">Managements</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                    Excepturi facilis neque nesciunt similique officiis veritatis,
                                </p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
