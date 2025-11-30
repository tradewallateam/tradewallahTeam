@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">General Site Setting</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Site Setting</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Social Media</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">About Section</h4>
                        <form action="{{ route('admin.pages.cms.general-about-setting') }}" class="manage-top-header"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="form-label">About Title</lable><span class="text-danger">*</span>
                                    <input type="text" name="about_title" id="about-title" class="form-control"
                                        value="{{ old('about_title', $generalSetting->about_title ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <lable class="form-label">Descriptions</lable><span class="text-danger">*</span>
                                    <textarea type="text" name="about_description" id="about-description" class="form-control">{{ $generalSetting->about_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Service Section -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Service Section</h4>
                        <form action="{{ route('admin.pages.cms.general-service-setting') }}" class="manage-top-header"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="form-label">Service Title</lable><span class="text-danger">*</span>
                                    <input type="text" name="service_title" id="service-title" class="form-control"
                                        value="{{ old('service_title', $generalSetting->service_title ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <lable class="form-label">Service Descriptions</lable><span class="text-danger">*</span>
                                    <textarea type="text" name="service_description" id="service-description" class="form-control">{{ $generalSetting->service_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Team Section -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Team Section</h4>
                        <form action="{{ route('admin.pages.cms.general-team-setting') }}" class="manage-top-header"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="form-label">Team Title</lable><span class="text-danger">*</span>
                                    <input type="text" name="team_title" id="team-title" class="form-control"
                                        value="{{ old('team_title', $generalSetting->team_title ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <lable class="form-label">Team Description</lable><span class="text-danger">*</span>
                                    <textarea type="text" name="team_description" id="team-description" class="form-control">{{ $generalSetting->team_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Pricing Section -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Pricing Section</h4>
                        <form action="{{ route('admin.pages.cms.general-pricing-setting') }}" class="manage-top-header"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="form-label">Pricing Title</lable><span class="text-danger">*</span>
                                    <input type="text" name="pricing_title" id="pricing-title" class="form-control"
                                        value="{{ old('pricing_title', $generalSetting->pricing_title ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <lable class="form-label">Pricing Description</lable><span
                                        class="text-danger">*</span>
                                    <textarea type="text" name="pricing_description" id="pricing-description" class="form-control">{{ $generalSetting->pricing_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Rist Disclaimer Section -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Rist Disclaimer Section</h4>
                        <form action="{{ route('admin.pages.cms.general-risk-disclaimer-setting') }}"
                            class="manage-top-header" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <lable class="form-label">Risk Disclaimer Title</lable><span
                                        class="text-danger">*</span>
                                    <input type="text" name="risk_disclaimer_title" id="risk-disclaimer-title"
                                        class="form-control"
                                        value="{{ old('risk-disclaimer_title', $generalSetting->risk_disclaimer_title ?? '') }}">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <lable class="form-label">Risk Disclaimer Description</lable><span
                                        class="text-danger">*</span>
                                    <textarea type="text" name="risk_disclaimer_description" id="editor" class="form-control">{{ $generalSetting->risk_disclaimer_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Contact Section -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Contact Section</h4>
                        <form action="{{ route('admin.pages.cms.general-contact-setting') }}" class="manage-top-header"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <lable class="form-label">Contact Title</lable><span class="text-danger">*</span>
                                    <input type="text" name="contact_title" id="contact-title" class="form-control"
                                        value="{{ old('contact', $generalSetting->contact_title ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <lable class="form-label">Contact Description</lable><span
                                        class="text-danger">*</span>
                                    <textarea type="text" name="contact_description" id="contact-description" class="form-control"> {{ $generalSetting->contact_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-4" style="float: right">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
