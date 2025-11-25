@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">

        @include('layouts.navbar')

        @include('layouts.carousel')

    </div>

    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h4 class="text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">Meet our company unless miss the opportunity</h1>
                        <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum velit
                            temporibus repudiandae ipsa, eaque perspiciatis cumque incidunt tenetur sequi reiciendis.
                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Business Consuluting</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Year Of Expertise</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover
                                    Now</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Call Us</h4>
                                        <p class="mb-0 fs-5" style="letter-spacing: 1px;">+01234567890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-5 mb-4">We Services provided best offer</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('public/assets/images/service-1.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4"> Strategy Consulting</a>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('public/assets/images/service-2.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="Image">
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
                            <img src="{{ asset('public/assets/images/service-3.jpg') }}" class="img-fluid rounded-top w-100"
                                alt="Image">
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
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Team</h4>
                <h1 class="display-5 mb-4">Meet Our Advisers</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt
                    sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                @if (!empty($teams))
                    @foreach ($teams as $member)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="team-item">
                                <div class="team-img">
                                    @if (!empty($member->image))
                                        <img src="{{ asset('public/storage/' . $member->image) }}" class="img-fluid"
                                            alt="{{ $member->name ?? 'Not Available' }}">
                                    @else
                                        <img src="{{ asset('assets/images/team-1.jpg') }}" class="img-fluid"
                                            alt="Image">
                                    @endif
                                </div>
                                <div class="team-title">
                                    <h4 class="mb-0">{{ $member->name ?? 'Not Available' }}</h4>
                                    <p class="mb-0">{{ $member->position ?? 'Not Available' }}</p>
                                </div>
                                <div class="team-icon">
                                    <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                                        href="{{ $member->facebook_link ?? '#' }}" target="__blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                                        href="{{ $member->twitter_link ?? '#' }}" target="__blank"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                                        href="{{ $member->linkedin_link ?? '#' }}" target="__blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-circle me-0"
                                        href="{{ $member->instagram_link ?? '#' }}" target="__blank"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('public/assets/images/team-1.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="team-title">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('public/assets/images/team-2.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="team-title">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('public/assets/images/team-3.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="team-title">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset('public/assets/images/team-4.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="team-title">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Pricing Start -->
    <div class="container-fluid pricing py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Pricing</h4>
                <h1 class="display-5 mb-4">Choose the Perfect Plan for Your Trading Journey</h1>
                <p class="mb-0">Transparent pricing with zero hidden fees. Start trading with the plan that fits your
                    goals.</p>
            </div>

            <div class="row g-5 justify-content-center">
                <!-- Basic Plan -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="pricing-item border border-primary rounded text-center p-5">
                        <div class="pricing-header mb-4">
                            <h5 class="text-primary">Basic Account</h5>
                            <h1 class="display-4 mb-0">$99<span class="fs-5 text-muted">/month</span></h1>
                        </div>
                        <div class="pricing-body mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Up to 10 trades/day</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Standard Spreads</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Basic Market Analysis</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Email Support</li>
                                <li class="py-2 text-muted"><i class="fa fa-times text-muted me-3"></i>Personal Manager
                                </li>
                                <li class="py-2 text-muted"><i class="fa fa-times text-muted me-3"></i>Trading Signals
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-pill py-3 px-5">Get Started</a>
                    </div>
                </div>

                <!-- Pro Plan (Recommended) -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="pricing-item border border-primary rounded text-center p-5 shadow-lg position-relative overflow-hidden"
                        style="z-index: 1;">
                        <div class="position-absolute top-0 start-50 translate-middle-x bg-primary text-white px-4 py-1 rounded-bottom"
                            style="z-index: 2;">
                            <small class="fw-bold">MOST POPULAR</small>
                        </div>
                        <div class="pricing-header mb-4 pt-4">
                            <h5 class="text-primary">Pro Account</h5>
                            <h1 class="display-4 mb-0">$299<span class="fs-5 text-muted">/month</span></h1>
                        </div>
                        <div class="pricing-body mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Unlimited Trades</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Tight Spreads from 0.0
                                    pips</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Advanced Analytics</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Daily Trading Signals</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Personal Account Manager
                                </li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Priority 24/7 Support</li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Get Started Now</a>
                    </div>
                </div>

                <!-- VIP Plan -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="pricing-item border border-primary rounded text-center p-5">
                        <div class="pricing-header mb-4">
                            <h5 class="text-primary">VIP Account</h5>
                            <h1 class="display-4 mb-0">$999<span class="fs-5 text-muted">/month</span></h1>
                        </div>
                        <div class="pricing-body mb-4">
                            <ul class="list-unstyled mb-0">
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>All Pro Features</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Zero Commission</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Exclusive Webinars</li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Custom Trading Strategies
                                </li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>Dedicated Senior Analyst
                                </li>
                                <li class="py-2"><i class="fa fa-check text-primary me-3"></i>VIP Events & Networking
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-pill py-3 px-5">Contact Us</a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.8s">
                <p class="mb-3">Need a custom enterprise solution?</p>
                <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill py-3 px-5">Talk to Sales</a>
            </div>
        </div>
    </div>
    <!-- Pricing End -->

    <!-- Risk Disclaimer Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="border-start border-primary border-5 ps-4">
                        <h4 class="text-primary mb-3">Important Risk Disclaimer</h4>
                        <h2 class="display-6 mb-4">Trading Involves Substantial Risk</h2>
                    </div>
                    <div class=" rounded p-5 ">
                        <p class="lead text-dark mb-4">
                            Trading foreign exchange, cryptocurrencies, stocks, CFDs, commodities, and other financial
                            instruments on margin carries a <strong>high level of risk</strong> and may not be suitable for
                            all investors.
                        </p>
                        <p class="text-dark mb-4">
                            The high degree of leverage can work against you as well as for you. Before deciding to trade,
                            you should carefully consider your investment objectives, level of experience, and risk
                            appetite. There is a possibility that you could sustain a <strong>loss of some or all of your
                                initial investment</strong> and therefore you should not invest money that you cannot afford
                            to lose.
                        </p>
                        <p class="text-dark mb-4">
                            You should be aware of all the risks associated with trading on margin and seek advice from an
                            independent financial advisor if you have any doubts. Past performance is not indicative of
                            future results. The content provided on this website is for informational and educational
                            purposes only and should not be construed as investment advice or a recommendation to buy or
                            sell any security or financial instrument.
                        </p>
                        <p class="text-dark mb-0">
                            <strong>By using this website and/or opening an account, you acknowledge that you have read,
                                understood, and agree to the full risk disclosure.</strong>
                        </p>
                        <hr class="my-4">
                        <small class="text-muted">
                            Trading involves risk. Losses can exceed deposits. Please ensure you fully understand the risks
                            involved.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Risk Disclaimer End -->

    <!-- Contact Form Section Start - Added below the buttons -->
    <div class="container-fluid bg-primary mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Left Side: Contact Info & CTA -->
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <h4 class="text-white mb-3">Start Trading Today</h4>
                    <h1 class="display-5 text-white mb-4">Get in Touch With Our Experts</h1>
                    <p class="text-white mb-4 opacity-90">
                        Whether you're new to trading or an experienced investor, our team is ready to help you succeed.
                        Ask about account opening, platforms, spreads, or personalized strategies.
                    </p>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-center text-white">
                            <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-1">Call Us Now</h5>
                                <h4 class="mb-0 text-white">+012 345 6789</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-1">Email Us</h5>
                                <h4 class="mb-0 text-white">support@yourtrading.com</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-headset fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-1">Live Support</h5>
                                <h4 class="mb-0 text-white">24/7 Available</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Contact Form -->
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="bg-white rounded p-5 shadow-lg">
                        <h3 class="text-primary mb-4">Send Us a Message</h3>
                        <form action="" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg border-primary" placeholder="Your Full Name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg border-primary" placeholder="Your Email"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone"
                                        class="form-control form-control-lg border-primary" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <select name="interest" class="form-select form-control-lg border-primary" required>
                                        <option value="">I'm interested in...</option>
                                        <option value="demo">Free Demo Account</option>
                                        <option value="live">Live Trading Account</option>
                                        <option value="crypto">Crypto Trading</option>
                                        <option value="signals">Trading Signals</option>
                                        <option value="education">Training & Education</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control form-control-lg border-primary" rows="5"
                                        placeholder="How can we help you today?"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 w-100">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message Now
                                    </button>
                                </div>
                                <div class="col-12 text-center">
                                    <small class="text-muted">
                                        <i class="fas fa-shield-alt text-primary me-2"></i>
                                        Your information is 100% secure and will never be shared.
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Section End -->
@endsection
