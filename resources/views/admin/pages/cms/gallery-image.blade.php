@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">
                <i class="mdi mdi-folder-image text-primary"></i>
                Gallery: {{ $folder->title ?? '' }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Gallery Folders</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($folder->title, 30) }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <!-- Header with Upload Button -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="card-title mb-0">
                                    Images in Folder
                                    <span class="badge bg-primary fs-6">{{ $folder->galleryImage->count() }}
                                        image{{ $folder->galleryImage->count() != 1 ? 's' : '' }}</span>
                                </h4>
                                @if ($folder->description)
                                    <p class="text-muted mb-0">{{ $folder->description }}</p>
                                @endif
                            </div>

                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#uploadImageModal">
                                <i class="mdi mdi-cloud-upload"></i> Upload Images
                            </button>
                        </div>

                        <!-- Images Grid -->
                        @if ($folder->galleryImage->count() > 0)
                            <div class="row g-4">
                                @foreach ($folder->galleryImage as $image)
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="image-card position-relative overflow-hidden rounded shadow-sm border"
                                            style="height: 280px; cursor: pointer;"
                                            onmouseover="this.querySelector('.image-actions').style.opacity='1'; this.querySelector('.image-actions').style.transform='translateY(0)'"
                                            onmouseout="this.querySelector('.image-actions').style.opacity='0'; this.querySelector('.image-actions').style.transform='translateY(20px)'">

                                            <img src="{{ asset('public/storage/' . $image->image) }}"
                                                class="img-fluid w-100 h-100"
                                                style="object-fit: cover; transition: transform 0.4s;"
                                                alt="{{ $image->title ?? 'Gallery Image' }}">

                                            <div class="position-absolute bottom-0 start-0 end-0 bg-gradient text-white p-3"
                                                style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                                                <h6 class="mb-0 text-center fw-bold">
                                                    {{ $image->title ?? 'Untitled Image' }}
                                                </h6>
                                                <small class="d-block text-center opacity-75">
                                                    {{ $image->status ? 'Published' : 'Draft' }}
                                                </small>
                                            </div>

                                            <div class="image-actions position-absolute top-50 start-50 translate-middle d-flex gap-2"
                                                style="opacity: 0; transform: translateY(20px); transition: all 0.3s; z-index: 10;">

                                                <a href="{{ asset('public/storage/' . $image->image) }}"
                                                    data-fancybox="gallery-{{ $folder->id }}"
                                                    class="btn btn-info btn-sm rounded-circle shadow-lg"
                                                    title="View Full Size">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                <a href="{{ route('admin.pages.cms.gallery-image-change-status', Crypt::encrypt($image->id)) }}"
                                                    class="btn {{ $image->status ? 'btn-secondary' : 'btn-success' }} btn-sm rounded-circle shadow-lg"
                                                    title="{{ $image->status ? 'Unpublish' : 'Publish' }}">
                                                    <i class="mdi mdi-{{ $image->status ? 'eye-off' : 'check' }}"></i>
                                                </a>

                                                <a href="{{ route('admin.pages.cms.gallery-image-delete', Crypt::encrypt($image->id)) }}"
                                                    class="btn btn-danger btn-sm delete-btn rounded-circle shadow-lg"
                                                    title="Delete Image">
                                                    <i class="mdi mdi-delete-forever"></i>
                                                </a>
                                            </div>

                                            <!-- Status Badge -->
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <span
                                                    class="badge rounded-pill {{ $image->status ? 'bg-success' : 'bg-warning text-dark' }}">
                                                    {{ $image->status ? 'Live' : 'Draft' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="mdi mdi-image-off text-muted" style="font-size: 90px;"></i>
                                <h5 class="mt-4 text-muted">No images in this folder yet</h5>
                                <p class="text-muted">Click "Upload Images" to add photos.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadImageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.pages.cms.upload-galley-images', Crypt::encrypt($folder->id)) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="mdi mdi-cloud-upload"></i> Upload Images to "{{ $folder->title }}"
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Select Images (Multiple)</label>
                            <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
                            <small class="text-muted">You can select multiple images at once.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Title (Optional - will apply to all)</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g., Team Dinner 2025">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-upload"></i> Upload Images
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Fancybox CSS & JS --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
        <style>
            .image-card:hover img {
                transform: scale(1.1);
            }

            .image-actions {
                backdrop-filter: blur(10px);
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script>
            Fancybox.bind("[data-fancybox]", {
                Thumbs: {
                    autoStart: false
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: ["zoomIn", "zoomOut"],
                        right: ["close"]
                    }
                }
            });
        </script>
    @endpush
@endsection
