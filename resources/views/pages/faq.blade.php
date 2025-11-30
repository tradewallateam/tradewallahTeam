{{-- resources/views/pages/faq.blade.php --}}
@extends('layouts.app')


@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', [
            'title' => 'FAQ - Frequently Asked Questions | Your Trading Broker',
            'subtitle' => 'FAQ',
        ])
    </div>


    <!-- FAQ Start -->
    <div class="container-fluid faq py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">FAQ</h4>
                <h1 class="display-5 mb-4">Common Questions About Trading With Us</h1>
                <p class="mb-0">
                    Find quick answers to the most frequently asked questions about accounts, deposits, trading platforms,
                    and more.
                </p>
            </div>

            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="faqAccordion">

                        <!-- Question 1 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true">
                                    Is my money safe with you?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes. Client funds are held in <strong>segregated accounts</strong> with top-tier banks,
                                    completely separate from company operational funds. We are regulated and follow strict
                                    financial standards to ensure maximum protection of your capital.
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2">
                                    What is the minimum deposit to start trading?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The minimum deposit is <strong>$100</strong> for a Basic account. Pro accounts start
                                    from $1,000 and VIP accounts from $10,000, giving you better spreads, leverage, and
                                    personal support.
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3">
                                    Do you offer a free demo account?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We provide a <strong>free unlimited demo account</strong> with $100,000
                                    virtual funds so you can practice trading with real market conditions without any risk.
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4">
                                    What trading platforms do you support?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We support <strong>MetaTrader 4 (MT4)</strong>, <strong>MetaTrader 5 (MT5)</strong>, and
                                    our own <strong>WebTrader</strong> platform. All are available on desktop, web, and
                                    mobile (iOS & Android).
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse5">
                                    How fast are withdrawals?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Withdrawal requests are processed within <strong>24 hours</strong> on business days.
                                    Depending on the payment method (bank wire, card, e-wallets), funds typically reach you
                                    in 1–5 business days.
                                </div>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse6">
                                    Are there any hidden fees or commissions?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No hidden fees. We are fully transparent. Spreads and any applicable commissions are
                                    clearly shown before you place a trade. Inactive accounts may incur a small monthly fee
                                    after 12 months of no activity.
                                </div>
                            </div>
                        </div>

                        <!-- Question 7 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.7s">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse7">
                                    Can I trade cryptocurrencies?
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! We offer 24/7 crypto CFD trading on Bitcoin, Ethereum, Ripple, Litecoin, and 50+
                                    other coins with competitive spreads and up to 1:20 leverage.
                                </div>
                            </div>
                        </div>

                        <!-- Question 8 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse8">
                                    Do you provide trading signals or education?
                                </button>
                            </h2>
                            <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pro and VIP clients receive <strong>daily trading signals</strong>, market analysis, and
                                    one-on-one training. All clients have free access to webinars, video tutorials, eBooks,
                                    and our Trading Academy.
                                </div>
                            </div>
                        </div>

                        <!-- Question 9 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.9s">
                            <h2 class="accordion-header" id="heading9">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse9">
                                    Is leverage available and what are the risks?
                                </button>
                            </h2>
                            <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we offer leverage up to <strong>1:500</strong> (depending on your region and
                                    account type). Higher leverage magnifies both profits and losses. We strongly recommend
                                    using proper risk management and never trading with money you cannot afford to lose.
                                </div>
                            </div>
                        </div>

                        <!-- Question 10 -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="1.0s">
                            <h2 class="accordion-header" id="heading10">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse10">
                                    How can I contact support?
                                </button>
                            </h2>
                            <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our support team is available <strong>24/7</strong> via live chat, email
                                    (support@yourtrading.com), phone (+012 345 6789), and ticket system inside your client
                                    area.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Still have questions? -->
            <div class="text-center mt-5 wow fadeInUp" data-wow-delay="0.2s">
                <h4 class="mb-4">Can't find the answer you're looking for?</h4>
                <p class="mb-4">Our support team is here to help you 24/7</p>
                <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill py-3 px-5">Contact Us Now</a>
            </div>
        </div>
    </div>
    <!-- FAQ End -->

    <!-- Risk Disclaimer (optional on FAQ page) -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <p class="text-muted small">
                        <strong>Risk Warning:</strong> Trading Forex, CFDs, and Cryptocurrencies involves significant risk
                        and can result in the loss of your invested capital. Please ensure you fully understand the risks
                        and seek independent advice if necessary.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
