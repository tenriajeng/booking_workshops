@extends('layouts.app')

@push('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive_lecturer.js') }}"></script>
@endpush

@push('title_page')
booking
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">booking List</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('booking.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i>
                New Record
            </a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @include('admin.booking.table')
        <!--end: Datatable-->
    </div>
</div>
@endsection