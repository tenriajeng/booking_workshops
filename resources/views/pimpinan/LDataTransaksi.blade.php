@extends('layouts._app')

@push('page_style')
@include('layouts.admin.css')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
@include('layouts.admin.js')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive_lecturer.js') }}"></script>
@endpush

@push('title_page')
User
@endpush

@section('content')


@include('layouts.admin.mobile_header')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        @include('pimpinan/layout/sidebar')

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
                                    <h3 class="card-label">Laporan Data Transaksi</h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Bayar</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($data as $booking)
                                        @if ($booking->status == 3)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $booking->user->email }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>
                                                <span class="label label-info label-inline mr-2">Finished</span>
                                            </td>
                                            <td>{{ $booking->order_date }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Bayar</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
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