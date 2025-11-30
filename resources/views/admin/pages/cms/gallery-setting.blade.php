@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Gallery Management</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active">Gallery Folders</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">
                                <i class="mdi mdi-folder-multiple-image text-primary"></i> Gallery Folders
                            </h4>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addGalleryFolder">
                                <i class="mdi mdi-plus"></i> Add Folder
                            </button>
                        </div>

                        @if ($folders->count() > 0)
                            <div class="row g-4">
                                @foreach ($folders as $folder)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                        <div class="folder-box position-relative rounded shadow-sm border overflow-hidden text-center"
                                            style="height: 220px; transition: all 0.5s ease; cursor: pointer;"
                                            onmouseover="this.querySelector('.folder-actions').style.opacity='1'"
                                            onmouseout="this.querySelector('.folder-actions').style.opacity='0'">

                                            <!-- Folder Icon -->
                                            <div class="pt-4">
                                                <i class="mdi mdi-folder-open-outline"
                                                    style="font-size: 80px; color: {{ $folder->status ? '#28a745' : '#ffc107' }};"></i>
                                            </div>

                                            <!-- Folder Title -->
                                            <div class="px-3">
                                                <h6 class="fw-bold text-primary mb-1" title="{{ $folder->title }}">
                                                    {{ Str::limit($folder->title, 18) }}
                                                </h6>
                                                <small class="text-muted d-block">
                                                    {{ $folder->galleryImage->count() ?? 0 }}
                                                    image{{ $folder->galleryImage->count() != 1 ? 's' : '' }}
                                                </small>
                                            </div>

                                            <!-- Status Badge -->
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <a
                                                    class="badge rounded-pill {{ $folder->status ? 'bg-success' : 'bg-dark' }} fs-6">
                                                    {{ $folder->status ? 'Active' : 'Inactive' }}
                                                </a>
                                            </div>

                                            <!-- Hover Action Buttons -->
                                            <div class="folder-actions position-absolute bottom-0 start-0 end-0 bg-gradient"
                                                style="background: rgba(0,0,0,0.8); padding: 12px 0; opacity: 0; transition: opacity 0.5s;">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('admin.pages.cms.view-gallery-folder', ['folder_name' => $folder->title ?? '', 'id' => Crypt::encrypt($folder->id)]) }}"
                                                        class="btn btn-sm btn-info text-white" title="View Images">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('admin.pages.cms.change-gallery-folder-status', Crypt::encrypt($folder->id)) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $folder->status ? 'btn-success' : 'btn-info' }} text-white"
                                                            title="{{ $folder->status ? 'Deactivate' : 'Activate' }}">
                                                            <i
                                                                class="mdi mdi-{{ $folder->status ? 'eye-off' : 'check-circle' }}"></i>
                                                        </button>
                                                    </form>

                                                    <a href="{{ route('admin.pages.cms.gallery-folder-delete', Crypt::encrypt($folder->id)) }}"
                                                        class="btn btn-sm btn-danger delete-btn text-white"
                                                        title="Delete Folder">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="mdi mdi-folder-open-outline text-muted" style="font-size: 90px;"></i>
                                <h5 class="mt-4 text-muted">No gallery folders created yet</h5>
                                <p class="text-muted">Click "Add Folder" to organize your first photo collection.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Folder Modal --}}

    {{-- ======================================== --}}
    {{-- ADD GALLERY FOLDER MODAL --}}
    {{-- ======================================== --}}
    <div class="modal fade" id="addGalleryFolder" tabindex="-1" aria-labelledby="addGalleryFolderLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.pages.cms.add-galler-folder') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addGalleryFolderLabel">
                            <i class="mdi mdi-folder-plus-outline"></i> Create New Gallery Folder
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="folder_title" class="form-label">Folder Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="title" id="folder_title"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="e.g., Dubai Trading Expo 2024" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="folder_description" class="form-label">Description (Optional)</label>
                            <textarea name="description" id="folder_description" rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Brief description about this gallery folder...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status_active"
                                    value="1" checked>
                                <label class="form-check-label" for="status_active"> Active </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status_inactive"
                                    value="0">
                                <label class="form-check-label" for="status_inactive"> Inactive </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="mdi mdi-close"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> Create Folder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Custom CSS --}}
    <style>
        .folder-box {
            border: 2px solid #e9ecef !important;
        }

        .folder-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
            border-color: #0d6efd !important;
        }

        .folder-actions {
            backdrop-filter: blur(4px);
        }
    </style>
@endsection
