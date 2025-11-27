{{-- resources/views/premium-signals.blade.php or your dashboard file --}}
@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')

        @include('layouts.breadcrumb', [
            'title' => 'Premium Trading Signals',
            'subtitle' => 'Join Our VIP Membership',
        ])
    </div>

    {{-- ========== PREMIUM MEMBERSHIP PAGE STARTS HERE ========== --}}
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden text-white"
        style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
        <div class="container py-5">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-10 mx-auto text-center">
                    <div
                        class="badge bg-danger rounded-pill px-4 py-2 mb-4 fw-bold animate__animated animate__pulse animate__infinite">
                        LIMITED TIME OFFER – 88% OFF
                    </div>

                    <h1 class="display-3 fw-bold mb-4">
                        Join <span class="text-warning">Alpha Traders VIP</span><br>
                        Lifetime Premium Signals
                    </h1>

                    <p class="lead fs-3 mb-5 opacity-90">
                        Daily 8–15 High-Accuracy Signals • 87%+ Win Rate • Real-Time Entries • 24/7 Support
                    </p>

                    <div class="price-box bg-black bg-opacity-50 backdrop-blur-lg rounded-4 p-5 d-inline-block shadow-lg">
                        <del class="text-muted fs-3">$999</del>
                        <h2 class="display-3 fw-bold text-success mb-2">$79 <small class="fs-4 text-light">Lifetime</small>
                        </h2>
                        <p class="mb-0 text-warning fw-bold">
                            <i class="fas fa-fire"></i> One-Time Payment • No Monthly Fees • Instant Access
                        </p>
                    </div>

                    <div class="mt-5">
                        <div id="countdown" class="display-5 fw-bold text-danger mb-3"></div>
                        <p class="fs-4">Price increases to $299 in:</p>
                    </div>

                    <div class="mt-4 d-flex flex-column flex-sm-row gap-4 justify-content-center">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="d-inline">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="YOUR_BUTTON_ID">
                            <button type="submit" class="btn btn-warning btn-lg px-6 py-4 fw-bold shadow-lg fs-4">
                                <i class="fab fa-paypal me-2"></i> YES! Secure My Spot – $79
                            </button>
                        </form>

                        <a href="https://buy.stripe.com/your_stripe_link"
                            class="btn btn-outline-light btn-lg px-6 py-4 border-3 fw-bold fs-4">
                            <i class="fas fa-credit-card me-2"></i> Pay with Card / Crypto
                        </a>
                    </div>

                    <p class="mt-4 text-success fw-bold">
                        <i class="fas fa-lock"></i> SSL Secured • Instant Activation • 30-Day Money Back
                    </p>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="position-absolute top-0 end-0 opacity-10">
            <i class="fas fa-chart-line fa-10x"></i>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row g-5">
                @php
                    $benefits = [
                        ['icon' => 'fa-bolt', 'title' => '8–15 Daily Signals', 'desc' => 'Crypto, Forex & Stocks'],
                        ['icon' => 'fa-trophy', 'title' => '87%+ Win Rate', 'desc' => 'Verified Monthly Results'],
                        ['icon' => 'fa-clock', 'title' => 'Real-Time Alerts', 'desc' => 'Never Miss a Trade'],
                        ['icon' => 'fa-headset', 'title' => '24/7 VIP Support', 'desc' => 'Direct Analyst Help'],
                        ['icon' => 'fa-users', 'title' => '10,000+ Members', 'desc' => 'Active Pro Community'],
                        [
                            'icon' => 'fa-shield-alt',
                            'title' => 'Risk Management',
                            'desc' => 'Proper SL & Position Sizing',
                        ],
                    ];
                @endphp

                @foreach ($benefits as $b)
                    <div class="col-md-4">
                        <div
                            class="text-center p-4 bg-gradient rounded-4 h-100 border border-primary border-opacity-25 hover-lift shadow-sm">
                            <i class="fas {{ $b['icon'] }} fa-3x text-primary mb-3"></i>
                            <h5 class="fw-bold">{{ $b['title'] }}</h5>
                            <p class="small opacity-75">{{ $b['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-5 text-white text-center" style="background: linear-gradient(45deg, #141e30, #243b55);">
        <div class="container">
            <h2 class="display-5 fw-bold">Don’t Miss Out – This Offer Ends Soon!</h2>
            <p class="lead mb-4">Join 10,000+ profitable traders who trust Alpha Traders VIP</p>

            <button onclick="document.querySelector('form').submit()"
                class="btn btn-success btn-lg px-6 py-4 fw-bold shadow-lg">
                <i class="fas fa-crown me-2"></i> Get Lifetime Access Now – Only $79
            </button>

            <div class="mt-4">
                <img src="https://img.shields.io/badge/SSL-Secured-brightgreen" alt="SSL">
                <img src="https://img.shields.io/badge/Payments-PayPal%20%7C%20Stripe-blue" alt="Payments" class="ms-2">
                <img src="https://img.shields.io/badge/Guarantee-30%20Day%20Refund-success" alt="Guarantee" class="ms-2">
            </div>
        </div>
    </section>
    {{-- ========== END OF PREMIUM PAGE ========== --}}
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .hover-lift:hover {
            transform: translateY(-12px);
            transition: .3s;
        }

        .backdrop-blur-lg {
            backdrop-filter: blur(12px);
        }

        .bg-gradient {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.4), rgba(42, 82, 152, 0.3));
        }
    </style>
@endpush

@push('scripts')
    <script>
        function startCountdown() {
            const deadline = new Date().getTime() + (48 * 60 * 60 * 1000); // 48 hours

            setInterval(() => {
                const now = new Date().getTime();
                const distance = deadline - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML =
                    `${days}d ${hours}h ${minutes}m ${seconds}s left`;

                if (distance < 0) document.getElementById("countdown").innerHTML = "OFFER EXPIRED";
            }, 1000);
        }
        window.addEventListener("load", startCountdown);
    </script>
@endpush
