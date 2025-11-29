{{-- resources/views/services/service-details.blade.php --}}
@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', ['title' => $service->title, 'subtitle' => $service->title])
    </div>

    <!-- Service Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            {!! $service->serviceDetails->description ?? '' !!}
        </div>
    </div>
@endsection
