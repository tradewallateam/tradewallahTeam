{{-- resources/views/admin/profile.blade.php --}}
@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-circle"></i>
                </span>
                My Profile
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Update Profile Information</h4>
                        <form class="forms-sample" action="{{ route('admin.profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row align-items-start">
                                <div class="col-lg-4 text-center mb-4 mb-lg-0">
                                    <div class="position-relative d-inline-block">
                                        @if (isset($profile->image))
                                            <img src="{{ asset('public/storage/' . $profile->image) }}"
                                                alt="{{ $profile->name ?? '' }}" class="img-lg rounded-circle mb-3"
                                                style="width: 160px; height: 160px; object-fit: cover; border: 5px solid #fff; box-shadow: 0 5px 20px rgba(0,0,0,0.15);">
                                        @else
                                            <img src="{{ asset('public/assets/images/team-1.jpg') }}" alt="Admin Avatar"
                                                class="img-lg rounded-circle mb-3"
                                                style="width: 160px; height: 160px; object-fit: cover; border: 5px solid #fff; box-shadow: 0 5px 20px rgba(0,0,0,0.15);">
                                        @endif
                                        <div class="mt-3">
                                            <label class=" btn-primary btn-rounded btn-icon icon-custom-class">
                                                <i class="mdi mdi-camera"></i>
                                                <input type="file" name="profile_image" class="d-none" accept="image/*">
                                            </label>
                                            <small id="avatar-text" class="text-muted d-block mt-2">Click to change
                                                photo</small>
                                        </div>
                                    </div>
                                    <div class="mt-4 p-4 bg-gradient-primary text-white rounded">
                                        <h5 class="mb-1">{{ $profile->first_name ?? 'Alexander Pierce' }}</h5>
                                        <p class="mb-0"><i class="mdi mdi-shield-check"></i>Admin (Administration)</p>
                                        <small>Member since
                                            : {{ \Carbon\Carbon::parse($profile->created_at)->format('M Y') }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-gradient-info">
                                                        <span class="input-group-text text-white">
                                                            <i class="mdi mdi-account"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ old('name', $profile->first_name ?? '') }}"
                                                        placeholder="Enter full name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-gradient-warning">
                                                        <span class="input-group-text text-white">
                                                            <i class="mdi mdi-email"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{ old('email', $profile->email ?? '') }}"
                                                        placeholder="Enter email" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-gradient-success">
                                                        <span class="input-group-text text-white">
                                                            <i class="mdi mdi-phone"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="phone_number" id="phone_number"
                                                        class="form-control" placeholder="Phone number"
                                                        value="{{ old('phone_number', $profile->phone_number ?? '') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Address</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-gradient-success">
                                                        <span class="input-group-text text-white">
                                                            <i class="mdi mdi-home-plus"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="address" id="address" class="form-control"
                                                        value="{{ old('address', $profile->address ?? '') }}"
                                                        placeholder="Enter you address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <h5 class="mb-3 text-primary">
                                        <i class="mdi mdi-lock-outline"></i> Change Password (Optional)
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" class="form-control" value="{{ old('current_password') }}"
                                                    placeholder="••••••••">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" value="{{ old('password') }}"
                                                    placeholder="Minimum 8 characters">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"
                                                    placeholder="Retype new password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-primary btn-lg me-3 px-3">
                                            <i class="mdi mdi-content-save"></i> Save Changes
                                        </button>
                                        <button type="button" class="btn btn-danger btn-lg me-3 px-3">
                                            <i class="mdi mdi-cancel"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .icon-custom-class {
            background: blue;
            padding: 10px 14px;
            border-radius: 88px;
        }


        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #4facfe 0%, #43e97b 100%);
        }

        .input-group-text {
            border: none;
        }
    </style>


    <script>
        document.querySelector('input[name="profile_image"]').addEventListener('change', function() {
            let fileName = this.files.length ? this.files[0].name : null;

            document.getElementById('avatar-text').textContent =
                fileName ? "Selected: " + fileName : "Click to change photo";
        });
    </script>
@endsection
