@extends('layouts._app')

@push('page_style')
@include('layouts.admin.css')
<style>
    .deleteButton {
        cursor: pointer;
    }
</style>
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
@include('layouts.admin.js')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive_lecturer.js') }}"></script>
@endpush

@push('title_page')
Services
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
                                    <h3 class="card-label">Service List</h3>
                                </div>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ route('services.create') }}" class="btn btn-primary font-weight-bolder">
                                        <i class="la la-plus"></i>
                                        New Record
                                    </a>
                                    <!--end::Button-->
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                @include('admin.services.table')
                                <!--end: Datatable-->
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