@extends('layouts.app')

@push('page_style')
    @include('layouts.admin.css')
    <style>
        .deleteButton {
            cursor: pointer;
        }
    </style>
    <link href="{{ secure_asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
    @include('layouts.admin.js')
    <script src="{{ secure_asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ secure_asset('js/pages/crud/datatables/extensions/responsive.js') }}"></script>
@endpush

@push('title_page')
    Category
@endpush

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        @include('layouts.admin.subheader')
        <div class="d-flex flex-column-fluid">
            <div class="container">

                <!--begin::Content-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> Category List</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('category.create') }}" class="btn btn-primary font-weight-bolder">
                                <i class="la la-plus"></i> New Record</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        @include('admin.category.table')
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Content-->

            </div>
        </div>
    </div>
@endsection
