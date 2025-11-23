@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Registered Member</h4>
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Read</th>
                                    <th>Response</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($contacts))
                                    @foreach ($contacts as $index => $value)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $value->name ?? 'Not Available' }}</td>
                                            <td>{{ $value->email ?? 'Not Available' }}</td>
                                            <td>{{ $value->phone_number ?? 'Not Available' }}</td>
                                            <td>{{ $value->subject ?? 'Not Available' }}</td>
                                            <td>{{ $value->message ?? 'Not Available' }}</td>
                                            <td><label
                                                    class="badge badge-{{ $value->is_read ? 'success' : 'warning' }}">{{ $value->is_read ? 'Read' : 'UnRead' }}</label>
                                            </td>
                                            <td><label
                                                    class="badge badge-{{ $value->is_responded ? 'success' : 'warning' }}">{{ $value->is_responded ? 'Responded' : 'Not Responded' }}</label>
                                            </td>
                                            <td>{{ $value->created_at }}</td>
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
