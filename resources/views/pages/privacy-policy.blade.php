{{-- resources/views/pages/faq.blade.php --}}
@extends('layouts.app')


@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', [
            'title' => 'Privacy and Policy| ',
            'subtitle' => 'Privacy Policy',
        ])
    </div>

    <div class="container-fluid faq py-5">
        <div class="container py-5">
            {!! $footer->privacy_policy ?? '' !!}
        </div>
    </div>
@endsection
