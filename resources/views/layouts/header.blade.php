<!-- Topbar Start -->
<div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="#" class="text-muted small me-4">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $headerData->location ?? 'Your Location' }}
                </a>
                <a href="tel:{{ $headerData->phone_number ?? '' }}" class="text-muted small me-4">
                    <i class="fas fa-phone-alt text-primary me-2"></i>{{ $headerData->phone_number ?? '+123456789' }}
                </a>
                <a href="mailto:{{ $headerData->email ?? '' }}" class="text-muted small me-0">
                    <i class="fas fa-envelope text-primary me-2"></i>{{ $headerData->email ?? 'info@example.com' }}
                </a>
            </div>
        </div>

        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                @if (auth()->check() && auth()->user()->hasRole('member'))
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown">
                            <small><i class="fa fa-home text-primary me-2"></i> Dashboard</small>
                        </a>
                        <div class="dropdown-menu rounded">
                            <a href="{{ route('pages.dashboard') }}         " class="dropdown-item"><i
                                    class="fas fa-user-alt me-2"></i>Link</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Settings</a>
                            <a href="{{ route('auth.logout') }}" class="dropdown-item text-danger"><i
                                    class="fas fa-power-off me-2"></i>
                                Logout</a>
                        </div>
                    </div>
                @else
                    <a href="#" class="me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <small class="text-dark"><i class="fa fa-user text-primary me-2"></i>Register</small>
                    </a>

                    <!-- Login Button Triggers Modal -->
                    <a href="#" class="me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <small class="text-dark"><i class="fa fa-sign-in-alt text-primary me-2"></i>Login</small>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

{{-- ============================================== --}}
{{-- CUSTOM LOGIN MODAL - Works 100% in Any Template --}}
{{-- ============================================== --}}
<!-- ========== BULLETPROOF LOGIN MODAL (Works Everywhere) ========== -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0" style="border-radius: 16px; max-width: 420px; margin: 0 auto;">

            <!-- Header -->
            <div class="modal-header bg-primary text-white border-0" style="border-radius: 16px 16px 0 0;">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-lock me-2"></i> Login to Dashboard
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body p-5">
                <form method="POST" id="loginForm" data-login-url="{{ route('auth.login.submit') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-pill"
                            placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill"
                            placeholder="••••••••" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="" class="text-primary small">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm">
                        <i class="fas fa-sign-in-alt me-2"></i> Login Now
                    </button>
                </form>
                <div class="text-center mt-4">
                    <span class="text-muted">New user?</span>
                    <a href="javascript:void(0)" class="text-primary fw-bold ms-1"
                        onclick="switchModal('loginModal', 'registerModal')">
                        Create Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ==================== REGISTER MODAL (Perfect Match with Login) ==================== -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content shadow-lg border-0" style="border-radius: 16px; margin: 0 auto;">
            <div class="modal-header bg-success text-white border-0" style="border-radius: 16px 16px 0 0;">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-user-plus me-2"></i> Create New Account
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form method="POST" id="registerForm" data-register-url="{{ route('auth.register.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">First Name</label> <span
                                class="text-danger">*</span>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ old('first_name') }}" placeholder="John" required>
                            @error('first_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Last Name</label> <span class="text-danger">*</span>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name') }}" placeholder="Doe" required>
                            @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Email Address</label> <span
                                class="text-danger">*</span>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope text-success"></i>
                                </span>
                                <input type="email" name="email" class="form-control "
                                    value="{{ old('email') }}" placeholder="you@example.com" required>
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Phone (Optional)</label> <span
                                class="text-danger">*</span>
                            <input type="text" name="phone" class="form-control " value="{{ old('phone') }}"
                                placeholder="+1 234 567 890">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Password</label> <span class="text-danger">*</span>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock text-success"></i>
                                </span>
                                <input type="password" name="password" class="form-control "
                                    placeholder="Minimum 8 characters" required>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Confirm Password</label> <span
                                class="text-danger">*</span>
                            <input type="password" name="password_confirmation" class="form-control "
                                placeholder="Re-type password" required>
                        </div>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                        <label class="form-check-label small" for="terms">
                            I agree to the <span class="text-danger">*</span> <a href="#"
                                class="text-success text-decoration-underline">Terms &
                                Conditions</a>
                        </label>
                    </div>
                    <button type="submit" id="registerBtn"
                        class="btn btn-success btn-lg w-100 rounded-pill shadow-sm">
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        <i class="fas fa-user-plus me-2"></i>
                        <span class="btn-text">Create Account</span>
                    </button>
                </form>
                <div class="text-center mt-4">
                    <span class="text-muted">Already have an account?</span>
                    <a href="javascript:void(0)" class="text-success fw-bold ms-1"
                        onclick="switchModal('registerModal', 'loginModal')">
                        Login Here
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== END REGISTER MODAL ==================== -->
