@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Client Testimonials</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Client Testimonials</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>
                                Add Client Testimonials
                                <button type="button" class="btn btn-sm btn-success float-end" id="add-cart-item"
                                    data-bs-toggle="modal" data-bs-target="#addTestimonials">
                                    <i class="mdi mdi-plus"></i> Add
                                </button>
                            </h4>
                        </div>
                        <table id="table" class="table table-striped table-bordered table-white">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Rating</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($testimonials))
                                    @foreach ($testimonials as $index => $testimonial)
                                        <tr>
                                            <td>{{ $index + 1 }}.</td>
                                            <td>
                                                @if (!empty($testimonial->image))
                                                    <img src="{{ asset('public/storage/' . $testimonial->image) }}"
                                                        alt="{{ $testimonial->name ?? '' }}">
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->name ?? 'Not Available' }}</td>
                                            <td>{{ $testimonial->designation ?? 'Not Available' }}</td>
                                            <td>{{ $testimonial->rating ?? 'Not Available' }}</td>
                                            <td>{{ $testimonial->message ?? 'Not Available' }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.client-testimonial-status-change', Crypt::encrypt($testimonial->id)) }}"
                                                    class="badge rounded-3
                                                    pill text-bg-{{ $testimonial->is_active ? 'success' : 'warning' }}">{{ $testimonial->is_active ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>{{ $testimonial->created_at->format('d/m/Y h:i:s A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.delete-client-testimonial', Crypt::encrypt($testimonial->id)) }}"
                                                    class="btn btn-sm btn-danger delete-btn">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
