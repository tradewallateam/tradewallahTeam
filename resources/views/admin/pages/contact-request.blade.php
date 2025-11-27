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
                                            <td>
                                                @php
                                                    $fullMessage = $value->message ?? 'Not Available';
                                                    $shortMessage =
                                                        strlen($fullMessage) > 23
                                                            ? substr($fullMessage, 0, 23) . '...'
                                                            : $fullMessage;
                                                @endphp

                                                <span class="text-primary" style="cursor: pointer;" data-bs-toggle="modal"
                                                    data-bs-target="#messageModal" data-message="{{ $fullMessage }}">
                                                    {{ $shortMessage }}
                                                </span>
                                            </td>
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
    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Full Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalMessageContent">
                    <!-- JS will insert text here -->
                </div>
            </div>
        </div>
    </div>
    <script>
        const messageModal = document.getElementById('messageModal');
        messageModal.addEventListener('show.bs.modal', function(event) {
            const trigger = event.relatedTarget;
            const message = trigger.getAttribute('data-message');
            document.getElementById('modalMessageContent').textContent = message;
        });
    </script>

@endsection
