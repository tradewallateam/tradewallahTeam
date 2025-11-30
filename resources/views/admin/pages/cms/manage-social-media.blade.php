@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Social Media</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Social Media</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Manage Social Media</h4>
                        <form action="{{ route('admin.pages.cms.update-social-media') }}" class="manage-top-header"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Facebook Link</label>
                                    <input type="url" name="facebook"
                                        value="{{ old('facebook', $socialMedia->facebook ?? '') }}" class="form-control"
                                        placeholder="Enter Facebook link">
                                    @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Instagram Link</label>
                                    <input type="url" name="instagram" class="form-control"
                                        value="{{ old('instagram', $socialMedia->instagram ?? '') }}"
                                        placeholder="Enter Instagram link">
                                    @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Linked In Link</label>
                                    <input type="url" name="linked_in"
                                        value="{{ old('linked_in', $socialMedia->linked_in ?? '') }}" class="form-control"
                                        placeholder="Linked In link">
                                    @error('linked_in')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Twitter Link</label>
                                    <input type="url" name="twitter"
                                        value="{{ old('twitter', $socialMedia->twitter ?? '') }}" class="form-control"
                                        placeholder="Enter Twitter link">
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
