@extends('layouts.p_app')

@push('page_style')
    @include('layouts.admin.css')
    <link href="{{ secure_asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
    @include('layouts.admin.js')
    <script src="{{ secure_asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ secure_asset('js/pages/crud/datatables/extensions/responsive_lecturer.js') }}"></script>
@endpush

@push('title_page')
    User
@endpush

@section('content')
    @include('layouts.admin.mobile_header')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @include('pimpinan.layout.sidebar')

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
                                        <h3 class="card-label">Laporan Data Pengguna</h3>
                                    </div>
                                    <div class="card-title margin-left">
                                        <a href="{{ route('laporan.pengguna') }}" target="_blank"
                                            class="btn btn-outline-danger">Export PDF</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($data as $key => $user)
                                                @foreach (App\Models\User::find($user->id)->getRoleNames() as $role)
                                                    @if ($role == 'user')
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>
                                                                <div class="symbol symbol-50 symbol-light mr-2">
                                                                    <span class="symbol-label">
                                                                        <img src="{{ $user->avatar_url ?? '' }}"
                                                                            style="height: 20px;"
                                                                            class="h-50 align-self-center" alt="">
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
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
