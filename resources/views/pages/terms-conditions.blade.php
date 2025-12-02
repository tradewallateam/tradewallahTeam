{{-- resources/views/pages/faq.blade.php --}}
@extends('layouts.app')


@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')
        @include('layouts.breadcrumb', [
            'title' => 'Terms Conditions',
            'subtitle' => 'Terms Conditions',
        ])
    </div>

    <div class="container-fluid faq py-5">
        <div class="container py-5">
            {!! $footer->terms_conditions ?? '' !!}
        </div>
    </div>
@endsection
