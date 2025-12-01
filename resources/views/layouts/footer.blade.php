   <!-- Footer Start -->
   <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
       <div class="container py-5 border-start-0 border-end-0"
           style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
           <div class="row g-5">
               <div class="col-md-12 col-lg-6 col-xl-5">
                   <div class="footer-item">
                       <a href="{{ route('pages.home') }}" class="p-0">
                           <h4 class="text-white" style="font-size: -webkit-xxx-large;font-family: fantasy;">
                               @if (!empty($headerData->square_logo))
                                   <img src="{{ asset('public/storage/' . $headerData->square_logo) }}" alt="Image"
                                       style="width: 85px; border-radius:85%">
                               @else
                                   <img src="{{ asset('public/assets/images/logo.jpg') }}" alt="Image"
                                       style="width: 85px; border-radius:85%">
                               @endif
                               Trade<span class="text-warning">Walla</span>
                           </h4>
                       </a>
                       <p class="mb-4">
                           {{ $footer->description ??
                               'Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing...' }}
                       </p>
                   </div>
               </div>
               <div class="col-md-6 col-lg-2 col-xl-3">
                   <div class="footer-item">
                       <h4 class="text-white mb-4">Support</h4>
                       <a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                       <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                       <a href="#"><i class="fas fa-angle-right me-2"></i> Disclaimer</a>
                       <a href="#"><i class="fas fa-angle-right me-2"></i> Support</a>
                       <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ</a>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4 col-xl-4">
                   <div class="footer-item">
                       <h4 class="text-white mb-4">Contact Info</h4>
                       <div class="d-flex align-items-center">
                           <i class="fas fa-map-marker-alt text-primary me-3"></i>
                           <p class="text-white mb-0">{{ $contact->address ?? '123 Street New York.USA' }}</p>
                       </div>
                       <div class="d-flex align-items-center">
                           <i class="fas fa-envelope text-primary me-3"></i>
                           <p class="text-white mb-0">{{ $contact->email ?? 'info@example.com' }}</p>
                       </div>
                       <div class="d-flex align-items-center">
                           <i class="fa fa-phone-alt text-primary me-3"></i>
                           <p class="text-white mb-0">{{ $contact->phone_number ?? '(+012) 3456 7890' }}</p>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                           <i class="fab fa-firefox-browser text-primary me-3"></i>
                           <p class="text-white mb-0">{{ $contact->site_setting ?? 'Yoursite@ex.com' }}</p>
                       </div>
                       <div class="d-flex">
                           <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                               href="{{ $socialMediaLinks->facebook ?? '#' }}"><i
                                   class="fab fa-facebook-f text-white"></i></a>
                           <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                               href="{{ $socialMediaLinks->twitter ?? '#' }}"><i
                                   class="fab fa-twitter text-white"></i></a>
                           <a class="btn btn-primary btn-sm-square rounded-circle me-3"
                               href="{{ $socialMediaLinks->instagram ?? '#' }}"><i
                                   class="fab fa-instagram text-white"></i></a>
                           <a class="btn btn-primary btn-sm-square rounded-circle me-0"
                               href="{{ $socialMediaLinks->linked_in ?? '#' }}"><i
                                   class="fab fa-linkedin-in text-white"></i></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Footer End -->
