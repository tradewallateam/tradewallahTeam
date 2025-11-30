 <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
     <a href="" class="navbar-brand p-0">
         <img src="{{ asset('public/assets/images/logo.jpg') }}" alt="Logo">
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
             <a href="{{ route('pages.faq') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.faq') ? 'active' : '' }}">FAQ Section</a>
             <a href="{{ route('pages.risk') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.risk') ? 'active' : '' }}">Risk Disclaimer</a>
             <a href="{{ route('pages.gallery') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.gallery') ? 'active' : '' }}">Gallery</a>
             <a href="{{ route('pages.contact') }}"
                 class="nav-item nav-link {{ request()->routeIs('pages.contact') ? 'active' : '' }}">Contact Us</a>
         </div>
         <a href="#" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">Request for
             Query</a>
     </div>
 </nav>
