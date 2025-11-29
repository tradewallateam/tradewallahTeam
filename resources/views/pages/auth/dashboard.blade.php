{{-- resources/views/premium-signals.blade.php --}}
@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')

        @include('layouts.breadcrumb', [
            'title' => 'TradeWalla',
            'subtitle' => 'Join Our VIP Membership',
        ])
    </div>

    {{-- Floating Social Sidebar - Left Side --}}
    <div class="social-sidebar position-fixed start-0 top-50 translate-middle-y d-none d-lg-flex flex-column gap-3 p-3 bg-dark bg-opacity-90 backdrop-blur-lg rounded-end shadow-lg"
        style="z-index: 1030;">
        @php
            // You can move this to config/social.php or database later
            $socialLinks = [
                'telegram' => config('social.telegram_channel') ?? 'https://t.me/alphatradersvip',
                'instagram' => config('social.instagram') ?? null,
                'discord' => config('social.discord') ?? null,
                'whatsapp' => config('social.whatsapp_group') ?? null,
                'youtube' => config('social.youtube') ?? null,
                'twitter' => config('social.twitter') ?? null,
            ];
        @endphp

        <a href="{{ $socialLinks['telegram'] }}" target="_blank"
            class="btn btn-primary rounded-circle p-3 shadow hover-lift {{ $socialLinks['telegram'] ? '' : 'disabled opacity-50' }}"
            data-bs-toggle="tooltip" title="Join Telegram VIP Channel">
            <i class="fab fa-telegram-plane fa-2x"></i>
        </a>

        @if ($socialLinks['instagram'])
            <a href="{{ $socialLinks['instagram'] }}" target="_blank"
                class="btn btn-instagram rounded-circle p-3 shadow hover-lift"
                style="background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);">
                <i class="fab fa-instagram fa-2x text-white"></i>
            </a>
        @endif

        @if ($socialLinks['discord'])
            <a href="{{ $socialLinks['discord'] }}" target="_blank"
                class="btn btn-discord rounded-circle p-3 shadow hover-lift" style="background:#5865F2">
                <i class="fab fa-discord fa-2x text-white"></i>
            </a>
        @endif

        @if ($socialLinks['whatsapp'])
            <a href="{{ $socialLinks['whatsapp'] }}" target="_blank"
                class="btn btn-success rounded-circle p-3 shadow hover-lift">
                <i class="fab fa-whatsapp fa-2x text-white"></i>
            </a>
        @endif

        @if ($socialLinks['youtube'])
            <a href="{{ $socialLinks['youtube'] }}" target="_blank"
                class="btn btn-danger rounded-circle p-3 shadow hover-lift">
                <i class="fab fa-youtube fa-2x text-white"></i>
            </a>
        @endif

        @if ($socialLinks['twitter'])
            <a href="{{ $socialLinks['twitter'] }}" target="_blank"
                class="btn btn-info rounded-circle p-3 shadow hover-lift">
                <i class="fab fa-x-twitter fa-2x text-white"></i>
            </a>
        @endif

        <!-- Support Button -->
        <a href="https://t.me/alphatradersupport" target="_blank"
            class="btn btn-warning rounded-circle p-3 shadow hover-lift mt-3">
            <i class="fas fa-headset fa-2x"></i>
        </a>
    </div>

    {{-- ========== PREMIUM MEMBERSHIP PAGE STARTS HERE ========== --}}
    <section class="position-relative overflow-hidden text-white"
        style="background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%); min-height: 100vh;">
        <div class="container py-5">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-10 mx-auto text-center">
                    <div
                        class="badge bg-danger rounded-pill px-5 py-3 mb-4 fw-bold animate__animated animate__pulse animate__infinite fs-5">
                        <i class="fas fa-fire me-2"></i> LIMITED TIME: 88% OFF – ENDS IN 48 HOURS
                    </div>

                    <h1 class="display-2 fw-bold mb-4">
                        Welcome to <span class="text-warning">TradeWalla</span><br>
                        <span class="text-success">Lifetime Access Pass</span>
                    </h1>

                    <p class="lead fs-2 mb-5 opacity-90">
                        Daily 8–15 Precision Signals • 87%+ Win Rate • Crypto, Forex & Stocks
                    </p>

                    <div
                        class="price-box bg-black bg-opacity-70 backdrop-blur-xl rounded-5 p-5 d-inline-block shadow-2xl border border-warning border-opacity-30">
                        <del class="text-muted fs-2">$999</del>
                        <h2 class="display-1 fw-bold text-success mb-0">$79
                            <small class="fs-3 text-light opacity-75">/ Lifetime</small>
                        </h2>
                        <p class="mb-0 text-warning fw-bold fs-4 mt-3">
                            <i class="fas fa-bolt"></i> One-Time Payment • Instant VIP Access • No Recurring Fees
                        </p>
                    </div>

                    <div class="mt-5">
                        <div id="countdown" class="display-4 fw-bold text-danger mb-3 shadow-text"></div>
                        <p class="fs-3 text-warning">Price jumps to <strong>$299</strong> when timer ends!</p>
                    </div>

                    <div class="mt-5 d-flex flex-column flex-lg-row gap-4 justify-content-center">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="d-inline">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="YOUR_BUTTON_ID">
                            <button type="submit"
                                class="btn btn-warning btn-lg px-6 py-4 fw-bold shadow-lg fs-3 hover-lift">
                                <i class="fab fa-paypal me-3"></i> SECURE MY LIFETIME ACCESS – $79
                            </button>
                        </form>

                        <a href="https://buy.stripe.com/your_stripe_link"
                            class="btn btn-outline-light btn-lg px-6 py-4 border-3 fw-bold fs-3 hover-lift">
                            <i class="fas fa-credit-card me-3"></i> Pay with Card / Crypto
                        </a>
                    </div>

                    <div class="mt-5">
                        <p class="fs-4 text-success fw-bold">
                            <i class="fas fa-shield-alt me-2"></i> 100% Secure • Instant Activation • 30-Day Money Back
                            Guarantee
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="position-absolute top-0 end-0 opacity-10">
            <i class="fas fa-chart-line fa-10x text-success"></i>
        </div>
        <div class="position-absolute bottom-0 start-0 opacity-10">
            <i class="fas fa-coins fa-8x text-warning"></i>
        </div>
    </section>

    <!-- Benefits Grid -->
    <section class="py-6 bg-dark text-white">
        <div class="container">
            <div class="row g-5">
                @foreach ([['icon' => 'fa-bolt-lightning', 'color' => 'text-warning', 'title' => '8–15 Daily Signals', 'desc' => 'High-Probability Entries'], ['icon' => 'fa-trophy', 'color' => 'text-success', 'title' => '87%+ Win Rate', 'desc' => 'Independently Verified'], ['icon' => 'fa-bell', 'color' => 'text-info', 'title' => 'Real-Time Alerts', 'desc' => 'Telegram + Email'], ['icon' => 'fa-headset', 'color' => 'text-primary', 'title' => '24/7 Analyst Support', 'desc' => 'Live Chat & Calls'], ['icon' => 'fa-users', 'color' => 'text-cyan', 'title' => '10,000+ VIP Members', 'desc' => 'Active Community'], ['icon' => 'fa-shield-halberd', 'color' => 'text-danger', 'title' => 'Smart Risk Management', 'desc' => 'SL/TP + Position Sizing']] as $b)
                    <div class="col-md-4">
                        <div
                            class="text-center p-5 bg-gradient rounded-4 h-100 border {{ $b['color'] }} border-opacity-30 hover-lift shadow-lg">
                            <i class="fas {{ $b['icon'] }} fa-4x {{ $b['color'] }} mb-4"></i>
                            <h4 class="fw-bold">{{ $b['title'] }}</h4>
                            <p class="opacity-80">{{ $b['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-6 text-white text-center" style="background: linear-gradient(135deg, #141e30, #243b55);">
        <div class="container">
            <h2 class="display-4 fw-bold">This $79 Lifetime Deal <span class="text-danger">Won’t Last Forever</span></h2>
            <p class="lead fs-3 mb-5">Join the most profitable trading community in 2025</p>

            <button onclick="document.querySelector('form').scrollIntoView({behavior: 'smooth'})"
                class="btn btn-success btn-lg px-6 py-4 fw-bold shadow-lg fs-3 hover-lift">
                <i class="fas fa-crown me-3"></i> YES! I Want Lifetime VIP Access – Only $79
            </button>

            <div class="mt-5">
                <img src="https://img.shields.io/badge/Secure-SSL%20Encrypted-brightgreen" alt="SSL">
                <img src="https://img.shields.io/badge/Payment-PayPal%20%7C%20Stripe%20%7C%20Crypto-blue" alt="Payments"
                    class="ms-2">
                <img src="https://img.shields.io/badge/Guarantee-30%20Day%20Refund-success" alt="Guarantee"
                    class="ms-2">
                <img src="https://img.shields.io/badge/Members-10,000%2B%20VIP-blueviolet" alt="Members" class="ms-2">
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .hover-lift:hover {
            transform: translateY(-10px);
            transition: .4s ease;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4) !important;
        }

        .backdrop-blur-xl {
            backdrop-filter: blur(20px);
        }

        .bg-gradient {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.6), rgba(42, 82, 152, 0.4));
        }

        .shadow-text {
            text-shadow: 0 0 20px rgba(255, 0, 0, 0.7);
        }

        .social-sidebar a {
            width: 60px;
            height: 60px;
        }

        .btn-instagram {
            border: none;
        }

        @media (max-width: 992px) {
            .social-sidebar {
                display: none !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Countdown Timer - 48 hours
        function startCountdown() {
            const deadline = new Date().getTime() + (48 * 60 * 60 * 1000);
            const timer = setInterval(() => {
                const now = new Date().getTime();
                const distance = deadline - now;

                if (distance < 0) {
                    document.getElementById("countdown").innerHTML =
                        "<span class='text-danger'>OFFER EXPIRED!</span>";
                    clearInterval(timer);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML =
                    `<span class="text-warning">${days}d</span> : 
                     <span class="text-info">${hours}h</span> : 
                     <span class="text-success">${minutes}m</span> : 
                     <span class="text-danger">${seconds}s</span>`;
            }, 1000);
        }
        window.addEventListener("load", startCountdown);

        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) {
            return new bootstrap.Tooltip(el);
        });
    </script>
@endpush
