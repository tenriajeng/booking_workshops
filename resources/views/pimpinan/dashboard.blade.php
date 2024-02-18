@extends('layouts.p_app')

@push('title_page')
    Dashboard
@endpush

@section('content')
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
                    <img style="width: 100%" src="{{ secure_asset('Screen Shot 2022-02-23 at 6.31.43 PM.png') }}"
                        alt="">
                </div>
            </div>
            <!--end::Content-->

        </div>
    </div>
@endsection

@push('page_style')
    @include('layouts.admin.css')
@endpush

@push('page_script')
    @include('layouts.admin.js')
@endpush
