{{-- resources/views/pages/gallery.blade.php --}}
@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', [
            'title' => 'Gallery - Trading Events, Awards & Team | Tradewallah',
            'subtitle' => 'Our Gallery',
        ])
    </div>

    <!-- Dynamic Gallery Section -->
    <div class="container-fluid py-5 bg-light">
        <div class="container py-5">

            <!-- Section Header -->
            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                <h4 class="text-primary fw-bold">Our Gallery</h4>
                <h1 class="display-5 mb-4">Moments That Matter</h1>
                <p class="mb-0">Explore our trading journey through events, achievements, and team spirit.</p>
            </div>

            @php
                $folders = \App\Models\GalleryFolder::where('status', 1)->orderBy('title')->get();
                $hasFolders = $folders->count() > 0;
            @endphp

            @if ($hasFolders)
                <!-- Dynamic Tabs Navigation -->
                <ul class="nav nav-pills justify-content-center mb-5 flex-wrap" id="galleryTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill px-4 py-2 mx-2 mb-3" id="all-tab"
                            data-bs-toggle="pill" data-bs-target="#all">
                            All Photos
                        </button>
                    </li>
                    @foreach ($folders as $folder)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-4 py-2 mx-2 mb-3" data-bs-toggle="pill"
                                data-bs-target="#folder-{{ $folder->id }}" id="tab-{{ $folder->id }}">
                                {{ $folder->title ?? '' }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="galleryTabContent">

                    <!-- All Photos Tab -->
                    <div class="tab-pane fade show active" id="all">
                        <div class="row g-4">
                            @foreach (\App\Models\GalleryImage::whereHas('galleryFolder', fn($q) => $q->where('status', 1))->where('status', 1)->get() as $image)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ asset('public/storage/' . $image->image ?? '') }}" class="gallery-link"
                                        title="{{ $image->title ?? '' }}">
                                        <img src="{{ asset('public/storage/' . $image->image ?? '') }}"
                                            class="img-fluid rounded shadow-sm gallery-img" alt="{{ $image->title ?? '' }}">
                                    </a>
                                    <div class="text-center mt-2">
                                        <small class="text-muted">{{ $image->title ?? '' }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Dynamic Folder Tabs -->
                    @foreach ($folders as $folder)
                        <div class="tab-pane fade" id="folder-{{ $folder->id }}">
                            <div class="row g-4">
                                @forelse($folder->galleryImage()->where('status', 1)->get() as $image)
                                    <div class="col-lg-4 col-md-6">
                                        <a href="{{ asset('public/storage/' . $image->image ?? '') }}" class="gallery-link"
                                            title="{{ $image->title ?? '' }}">
                                            <img src="{{ asset('public/storage/' . $image->image ?? '') }}"
                                                class="img-fluid rounded shadow-sm gallery-img"
                                                alt="{{ $image->title ?? '' }}">
                                        </a>
                                        <div class="text-center mt-2">
                                            <small class="text-muted">{{ $image->title ?? '' }}</small>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5">
                                        <p class="text-muted">No images in this gallery yet.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted fs-4">Gallery is coming soon...</p>
                </div>
            @endif

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1/dist/magnific-popup.css">
    <style>
        .nav-pills .nav-link {
            background: #fff;
            color: #333;
            border: 1px solid #ddd;
            font-weight: 500;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .nav-pills .nav-link.active {
            background: linear-gradient(135deg, #0066cc, #0044aa);
            color: white;
            border-color: #0066cc;
            box-shadow: 0 4px 15px rgba(0, 102, 204, 0.3);
        }

        .gallery-img {
            height: 280px;
            object-fit: cover;
            transition: all 0.4s ease;
            border: 3px solid #f8f9fa;
        }

        .gallery-img:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2) !important;
            border-color: #0066cc;
        }

        .gallery-link {
            display: block;
            overflow: hidden;
            border-radius: 12px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1/dist/jquery.magnific-popup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.tab-content').magnificPopup({
                delegate: 'a.gallery-link',
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 2]
                },
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true,
                    duration: 300
                },
                image: {
                    titleSrc: 'title'
                }
            });
        });
    </script>
@endpush
