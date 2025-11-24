 <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
     <a href="" class="navbar-brand p-0">
         <h1 class="text-primary"><i class="fab fa-trade-federation  me-3"></i>Tradewalla</h1>
         <!-- <img src="img/logo.png" alt="Logo"> -->
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="fa fa-bars"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto py-0">
             <a href="{{ route('pages.home') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.home') ? 'active' : '' }}">Home</a>
             <a href="{{ route('pages.about') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.about') ? 'active' : '' }}">About</a>
             <a href="{{ route('pages.services') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.services') ? 'active' : '' }}">Services</a>
             <a href="{{ route('pages.about') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.about') ? 'active' : '' }}">FAQ Section</a>
             <a href="{{ route('pages.about') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.about') ? 'active' : '' }}">Risk Disclaimer</a>
             <a href="{{ route('pages.about') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.about') ? 'active' : '' }}">Pricing Page</a>
             <a href="{{ route('pages.contact') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.contact') ? 'active' : '' }}">Contact Us</a>
         </div>
         <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Request for
             Query</a>
     </div>
 </nav>
