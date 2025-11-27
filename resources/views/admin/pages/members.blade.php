@extends('admin.layouts.app')

@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Members </h3>
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
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($members))
                                    @foreach ($members as $index => $value)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $value->memberProfile->name ?? 'Not Available' }}</td>
                                            <td>{{ $value->email ?? 'Not Available' }}</td>
                                            <td>{{ $value->phone_number ?? 'Not Available' }}</td>
                                            <td>{{ $value->address ?? 'Not Available' }}</td>
                                            <td><a href="{{ route('admin.members.change-status', Crypt::encrypt($value->id)) }}"
                                                    class="badge badge-{{ $value->memberProfile->status ? 'success' : 'warning' }}">{{ $value->memberProfile->status ? 'Active' : 'Inactive' }}</a>
                                            </td>
                                            <td>{{ $value->created_at ?? 'Not Available' }}</td>
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
