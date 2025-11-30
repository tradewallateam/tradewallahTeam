{{-- resources/views/pages/risk-disclaimer.blade.php --}}
@extends('layouts.app')


@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', [
            'title' => 'Risk Disclaimer - Important Trading Risks | Forex Treding',
            'subtitle' => 'Risk Disclaimer',
        ])
    </div>

    <!-- Risk Disclaimer Content Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.2s">

                    <div class="border-start border-primary border-5 ps-4 mb-5">
                        <h1 class="display-5 mb-3">Important Risk Disclosure</h1>
                        <p class="lead text-dark">
                            Trading involves substantial risk and is not suitable for all investors.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-exclamation-triangle text-warning me-3"></i>High Risk
                            Warning</h3>
                        <p class="text-dark fs-5 lh-lg">
                            Trading foreign exchange (Forex), Contracts for Difference (CFDs), cryptocurrencies,
                            commodities, indices, and other leveraged financial instruments carries a <strong>high level of
                                risk</strong> and <strong>may result in the loss of all your invested capital</strong>.
                            These products may not be suitable for all investors.
                        </p>
                        <p class="text-dark fs-5 lh-lg">
                            Due to the high degree of leverage offered, even small market movements can lead to significant
                            profits or losses — often in excess of your initial deposit. You should only trade with money
                            you can afford to lose.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-chart-line text-danger me-3"></i>Leverage Risk</h3>
                        <p class="text-dark fs-5 lh-lg">
                            Leverage can work both for and against you. While it magnifies potential profits, it also
                            magnifies potential losses. For example, using 1:500 leverage means a 0.2% adverse price
                            movement can wipe out your entire margin.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-coins text-warning me-3"></i>Loss of Capital</h3>
                        <p class="text-dark fs-5 lh-lg">
                            Between <strong>74-89% of retail investor accounts lose money</strong> when trading CFDs, Forex,
                            and cryptocurrencies. You should consider whether you understand how these products work and
                            whether you can afford to take the high risk of losing your money.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-ban text-danger me-3"></i>No Guarantee of Profit</h3>
                        <p class="text-dark fs-5 lh-lg">
                            Past performance is not indicative of future results. Any examples, charts, or hypothetical
                            trading results shown on this website are for illustrative purposes only and do not guarantee
                            future profits.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-gavel text-primary me-3"></i>Regulatory & Legal
                            Notice</h3>
                        <p class="text-dark fs-5 lh-lg">
                            [Your Company Name] is operated by [Legal Entity Name], registered in [Jurisdiction]. We are
                            authorized and regulated by [Regulatory Body – if applicable]. Services may not be available in
                            certain jurisdictions due to legal restrictions.
                        </p>
                        <p class="text-dark">
                            The information on this website is not directed at residents of the United States, Belgium, or
                            any particular country outside our authorized jurisdictions and is not intended for distribution
                            to, or use by, any person in any country where such distribution or use would be contrary to
                            local law or regulation.
                        </p>
                    </div>

                    <div class="bg-white rounded shadow-sm p-5 mb-4">
                        <h3 class="text-primary mb-4"><i class="fas fa-user-shield text-success me-3"></i>Your
                            Responsibility</h3>
                        <p class="text-dark fs-5 lh-lg">
                            It is your responsibility to ensure that trading is legal in your jurisdiction and that you
                            fully understand the risks involved. We strongly recommend seeking independent financial advice
                            before opening an account or trading.
                        </p>
                    </div>

                    <!-- Final Strong Warning -->
                    <div class="alert alert-danger border-0 rounded p-5 text-center">
                        <h2 class="text-danger mb-4">
                            <i class="fas fa-skull-crossbones fa-2x"></i><br>
                            You Could Lose All Your Invested Capital
                        </h2>
                        <p class="fs-4">
                            <strong>By continuing to use this website and/or opening a trading account, you acknowledge that
                                you have read, understood, and accept the full risk disclosure stated above.</strong>
                        </p>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary rounded-pill py-3 px-5 me-3">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                        <a href="{{ url('/contact') }}" class="btn btn-primary rounded-pill py-3 px-5">
                            <i class="fas fa-headset me-2"></i>Contact Support
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Risk Disclaimer Content End -->
@endsection
