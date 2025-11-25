@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Team Settings</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Team Settings
                    <li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>
                                Team Members
                                <button type="button" class="btn btn-sm btn-success float-end" id="add-cart-item"
                                    data-bs-toggle="modal" data-bs-target="#teamMemberModel">
                                    <i class="mdi mdi-plus"></i>Add
                                </button>
                            </h4>
                        </div>
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($teams))
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('public/storage/' . $team->image) }}" alt="Team Image"
                                                    width="80" height="80">
                                            </td>
                                            <td>{{ $team->name ?? 'Not Available' }}</td>
                                            <td>{{ $team->position }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.team-member-status', Crypt::encrypt($team->id)) }}"
                                                    style="text-decoration: none"
                                                    class="badge bg-{{ $team->status ? 'success' : 'warning' }}">{{ $team->status ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>{{ $team->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.pages.cms.delete-team-member', Crypt::encrypt($team->id)) }}"
                                                    style="text-decoration: none" class="btn btn-sm btn-danger delete-btn">
                                                    <i class="mdi mdi-delete"></i> Delete
                                                </a>
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
