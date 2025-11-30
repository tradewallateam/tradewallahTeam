@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">Paid Links</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Paid Links</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>
                                Add Links
                                <button type="button" class="btn btn-sm btn-success float-end" id="add-cart-item"
                                    data-bs-toggle="modal" data-bs-target="#addLinks">
                                    <i class="mdi mdi-plus"></i> Add
                                </button>
                            </h4>
                        </div>
                        <table id="table" class="table table-striped table-bordered table-white">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($links))
                                    @foreach ($links as $index => $link)
                                        <tr>
                                            <td>{{ $index + 1 }}.</td>
                                            <td>{{ $link->link_name ?? 'Not Available' }}</td>
                                            <td>{{ $link->type ?? 'Not Available' }}</td>
                                            <td>{{ Crypt::decrypt($link->link_url) ?? 'Not Available' }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.paid-link-change-status', Crypt::encrypt($link->id)) }}"
                                                    class="badge rounded-3
                                                    pill text-bg-{{ $link->status ? 'success' : 'warning' }}">{{ $link->status ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>{{ $link->created_at->format('d/m/Y h:i:s A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.paid-link-delete', Crypt::encrypt($link->id)) }}"
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
