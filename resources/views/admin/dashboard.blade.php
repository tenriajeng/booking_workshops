@extends('layouts._app')

@push('title_page')
Dashboard
@endpush

@section('content')

@include('layouts.admin.mobile_header')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        @include('layouts.admin.side')

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            @include('layouts.admin.header')

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @include('layouts.admin.subheader')
                <div class="d-flex flex-column-fluid">
                    <div class="container">

                        <!--begin::Content-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Dashboard </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <img style="width: 100%" src="{{ asset('Screen Shot 2022-02-23 at 6.31.43 PM.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <!--end::Content-->

                    </div>
                </div>
            </div>

            @include('layouts.admin.footer')

        </div>

        @include('layouts.admin.profile')
        <!--end::Wrapper-->
    </div>
</div>

@endsection

@push('page_style')
@include('layouts.admin.css')
@endpush

@push('page_script')
@include('layouts.admin.js')
@endpush