@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Manage Header & Hero Section</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active">Header Settings</li>
                </ol>
            </nav>
        </div>

        <!-- Single Form - Everything in One -->
        <form action="{{ route('admin.pages.cms.update-header') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Top Header Contact Info -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Top Header Contact Information</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Contact Number</label>
                                    <input type="text" name="phone_number" value="{{ $header->phone_number ?? '' }}"
                                        class="form-control" placeholder="+1 (555) 123-4567">
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ $header->email ?? '' }}"
                                        class="form-control" placeholder="contact@yourdomain.com">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Address / Location</label>
                                    <input type="text" name="location" value="{{ $header->location ?? '' }}"
                                        class="form-control" placeholder="123 Wall Street, New York">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Section -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Hero Section Content</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Main Title</label>
                                    <input type="text" name="title" value="{{ $header->title ?? '' }}"
                                        class="form-control" placeholder="Trade with Confidence">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Subtitle</label>
                                    <input type="text" name="subtitle" value="{{ $header->subtitle ?? '' }}"
                                        class="form-control" placeholder="Professional Trading Solutions">
                                    @error('subtitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Subtitle Description</label>
                                    <textarea name="subtitle_description" class="form-control" rows="4">{{ $header->subtitle_description ?? '' }}</textarea>
                                    @error('subtitle_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Video Link (YouTube/Vimeo)</label>
                                    <input type="url" name="video_link" value="{{ $header->video_link ?? '' }}"
                                        class="form-control" placeholder="https://www.youtube.com/embed/abc123">
                                    @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Background Images -->
                                <div class="col-md-6 mb-4">
                                    <label>Hero Background Image 1</label>
                                    <input type="file" name="background_image_1" class="form-control" accept="image/*">
                                    @if (!empty($header->background_image_1))
                                        <div class="mt-2">
                                            <img src="{{ asset('public/storage/' . $header->background_image_1) }}"
                                                alt="BG 1" style="max-height: 100px; border-radius: 8px;">
                                            <small class="text-success">Current image</small>
                                        </div>
                                    @endif
                                    @error('background_image_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>Hero Background Image 2</label>
                                    <input type="file" name="background_image_2" class="form-control" accept="image/*">
                                    @if (!empty($header->background_image_2))
                                        <div class="mt-2">
                                            <img src="{{ asset('public/storage/' . $header->background_image_2) }}"
                                                alt="BG 2" style="max-height: 100px; border-radius: 8px;">
                                            <small class="text-success">Current image</small>
                                        </div>
                                    @endif
                                    @error('background_image_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo Settings -->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Website Logos & Favicon</h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label>Square Logo (Recommended: 512x512)</label>
                                    <input type="file" name="square_logo" class="form-control" accept="image/*">
                                    @if (!empty($header->square_logo))
                                        <img src="{{ asset('public/storage/' . $header->square_logo) }}"
                                            alt="Square Logo" class="mt-2" style="max-height: 80px;">
                                    @endif
                                    @error('square_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>Horizontal Logo (Navbar)</label>
                                    <input type="file" name="horizontal_logo" class="form-control" accept="image/*">
                                    @if (!empty($header->horizontal_logo))
                                        <img src="{{ asset('public/storage/' . $header->horizontal_logo) }}"
                                            alt="Horizontal Logo" class="mt-2" style="max-height: 80px;">
                                    @endif
                                    @error('horizontal_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>PNG Square Logo (Transparent)</label>
                                    <input type="file" name="png_square_logo" class="form-control"
                                        accept="image/png">
                                    @if (!empty($header->png_square_logo))
                                        <img src="{{ asset('public/storage/' . $header->png_square_logo) }}"
                                            alt="PNG Square" class="mt-2" style="max-height: 80px;">
                                    @endif
                                    @error('png_square_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>PNG Horizontal Logo (Transparent)</label>
                                    <input type="file" name="png_horizontal_logo" class="form-control"
                                        accept="image/png">
                                    @if (!empty($header->png_horizontal_logo))
                                        <img src="{{ asset('public/storage/' . $header->png_horizontal_logo) }}"
                                            alt="PNG Horizontal" class="mt-2" style="max-height: 80px;">
                                    @endif
                                    @error('png_horizontal_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>Favicon (.ico recommended)</label>
                                    <input type="file" name="favicon" class="form-control" accept=".ico,image/png">
                                    @if (!empty($header->favicon))
                                        <img src="{{ asset('public/storage/' . $header->favicon) }}" alt="Favicon"
                                            class="mt-2" style="max-height: 64px;">
                                    @endif
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end my-4">
                <button type="submit" class="btn btn-primary btn-lg px-4">
                    Save All Changes
                </button>
            </div>
        </form>
    </div>
@endsection
