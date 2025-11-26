@extends('layouts.app')

@section('main-content')
    <div class="container-fluid position-relative p-0">
        @include('layouts.navbar')

        @include('layouts.breadcrumb', ['title' => 'Dashboard', 'subtitle' => 'Dashboard'])
    </div>

    <div class="container-fluid about py-5">
        <div class="container py-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, molestias voluptates. Sapiente maiores cum
                veniam earum autem impedit ad saepe, accusantium provident dolor cumque itaque sed aspernatur, laborum, iste
                maxime?</p>
        </div>
    </div>
@endsection
