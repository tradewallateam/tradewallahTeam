{{-- resources/views/services/service-details.blade.php --}}
@extends('layouts.app')

@section('title', 'Strategy Consulting - Service Details')

@section('main-content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('public/assets/images/page-header.jpg') }}) center center no-repeat; background-size: cover;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Strategy Consulting</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="/services" class="text-white">Services</a></li>
                    <li class="breadcrumb-item active text-white">Strategy Consulting</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left: Image -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded shadow-lg">
                        <img src="{{ asset('public/assets/images/service-1.jpg') }}" 
                             class="img-fluid w-100 rounded" 
                             alt="Strategy Consulting"
                             style="height: 500px; object-fit: cover;">
                        <div class="position-absolute start-0 top-0 m-4 py-2 px-4 bg-primary text-white rounded-pill">
                            Most Popular
                        </div>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-5 mb-4">Strategy Consulting for Trading Companies</h1>
                    <p class="fs-5 text-muted mb-4">
                        Transform your trading business with data-driven strategies that deliver measurable growth and sustainable competitive advantage.
                    </p>

                    <p class="mb-4">
                        Our Strategy Consulting service helps commodity, forex, and stock trading firms develop winning strategies 
                        tailored to volatile markets. From market entry plans to digital transformation roadmaps, we guide you 
                        every step of the way.
                    </p>

                    <ul class="list-unstyled mb-5">
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Market Analysis & Opportunity Identification</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Competitive Positioning & Benchmarking</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Go-to-Market Strategy Development</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Risk Assessment & Mitigation Planning</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Digital Transformation Roadmap</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Performance Tracking Dashboard Setup</li>
                    </ul>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="#get-quote" class="btn btn-primary rounded-pill py-3 px-5">
                            Get Free Consultation
                        </a>
                        <a href="tel:+1234567890" class="btn btn-outline-primary rounded-pill py-3 px-5">
                            <i class="fa fa-phone-alt me-2"></i> Call Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Key Features Section -->
            <div class="row g-5 mt-5">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="text-primary text-uppercase">What You'll Get</h4>
                    <h2 class="display-6">Comprehensive Strategy Solutions</h2>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-chart-line fa-4x text-primary"></i>
                        </div>
                        <h5>Growth Strategy</h5>
                        <p>Custom growth plans based on your current position and market opportunities in trading sectors.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-shield-alt fa-4x text-primary"></i>
                        </div>
                        <h5>Risk Management</h5>
                        <p>Identify, assess, and build frameworks to protect your capital in volatile markets.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-users-cog fa-4x text-primary"></i>
                        </div>
                        <h5>Operational Excellence</h5>
                        <p>Streamline processes, reduce costs, and improve execution speed.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-laptop-code fa-4x text-primary"></i>
                        </div>
                        <h5>Technology Integration</h5>
                        <p>Implement trading platforms, algo systems, CRM, and analytics tools.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-handshake fa-4x text-primary"></i>
                        </div>
                        <h5>Partnership Development</h5>
                        <p>Build strategic alliances with brokers, banks, and liquidity providers.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="text-center p-4 rounded border bg-light h-100">
                        <div class="mb-4">
                            <i class="fa fa-trophy fa-4x text-primary"></i>
                        </div>
                        <h5>Performance Monitoring</h5>
                        <p>Real-time KPI tracking and monthly strategy review meetings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container-fluid py-5 bg-primary wow fadeInUp" id="get-quote" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 align-items-center text-white">
                <div class="col-lg-8">
                    <h1 class="display-5 text-white mb-3">Ready to Build a Winning Trading Strategy?</h1>
                    <p class="fs-5 mb-0">
                        Join 200+ trading companies that grew 40%+ YoY with our proven strategy frameworks.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/contact') }}" class="btn btn-light rounded-pill py-3 px-5 fs-5">
                        Start Your Free Consultation
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Services (Dummy) -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h4 class="text-primary">Explore More</h4>
                <h2 class="display-6">You Might Also Need</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item rounded overflow-hidden shadow">
                        <img src="{{ asset('public/assets/images/service-2.jpg') }}" class="img-fluid" alt="">
                        <div class="p-4">
                            <h5>Financial Advisory</h5>
                            <p>Capital structure, funding, and financial risk management for traders.</p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded overflow-hidden shadow">
                        <img src="{{ asset('public/assets/images/service-5.jpg') }}" class="img-fluid" alt="">
                        <div class="p-4">
                            <h5>Hr Consulting</h5>
                            <p>Build high-performance trading teams and compliance-ready staff.</p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item rounded overflow-hidden shadow">
                        <img src="{{ asset('public/assets/images/service-6.jpg') }}" class="img-fluid" alt="">
                        <div class="p-4">
                            <h5>Marketing Consulting</h5>
                            <p>Attract clients and build brand authority in competitive markets.</p>
                            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection