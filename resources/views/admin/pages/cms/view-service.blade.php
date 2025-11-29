@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Team Settings</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team Settings</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.pages.cms.update-service-details', Crypt::encrypt($service->id)) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <h4 class="text-center">
                                    {{ $service->title ?? 'Not Available' }}
                                </h4>

                                <div class="col-12 mt-4">
                                    @if (isset($service->serviceDetails->banner))
                                        <p><strong>Current Banner:</strong></p>
                                        <img src="{{ asset('public/storage/' . $service->serviceDetails->banner) }}"
                                            style="max-width: 300px; border-radius: 8px;">
                                    @endif
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <label class="form-label">Upload New Banner</label>
                                        <input type="file" name="banner" id="banner" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="editor" required>
                                    {{ $service->serviceDetails->description ?? '' }}
                                </textarea>
                                </div>

                            </div>
                            <button style="float: right" class="btn btn-primary m-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
