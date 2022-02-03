@extends('layouts._app')

@push('page_style')
    @include('layouts.user.css')
    <style>
        .card:hover {
            cursor: pointer;
        }

    </style>
@endpush

@section('content')

    @include('sweetalert::alert')

    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        @include('layouts.user.header')
        <!--end: Inspiro Slider -->
        <!-- Content -->
        @include('layouts.user.menu')
        <!-- end: Content -->
        <!-- Footer -->
        @include('layouts.user.footer')
        <!-- end: Footer -->
    </div>

@endsection

@push('page_script')

    @include('layouts.user.js')

    <script>
        function menuClick(params) {
            if ("product" == params) {
                window.location.href = "{{ route('guestproduct') }}";
            } else if ("book" == params) {
                window.location.href = "{{ route('book') }}";
            } else if ("history" == params) {
                window.location.href = "{{ route('user.history') }}";
            }
        }
    </script>
@endpush
