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
                                        <h3 class="card-label">Admin List</h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <a href="{{ route('pimpinan.create') }}"
                                            class="btn btn-primary font-weight-bolder">
                                            <i class="la la-plus"></i>
                                            New Record
                                        </a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>IMAGE</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
                                                <th>ROLE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $user)
                                                @foreach (App\Models\User::find($user->id)->getRoleNames() as $role)
                                                    @if ($role == 'admin' || $role == 'pimpinan')
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
                                                            <td>

                                                                <span
                                                                    class="label label-outline-info label-inline mr-2">{{ $role }}</span>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown dropdown-inline">
                                                                    <a href="javascript:;"
                                                                        class="btn btn-sm btn-clean btn-icon"
                                                                        data-toggle="dropdown">
                                                                        <i class="la la-cog"></i>
                                                                    </a>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                        <ul class="nav nav-hoverable flex-column">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link"
                                                                                    href="/pimpinan/edit/{{ $user->id }}">
                                                                                    <i class="nav-icon la la-edit"></i>
                                                                                    <span class="nav-text">Edit</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a href="/pimpinan/delete/{{ $user->id }}"
                                                                                    class="nav-link deleteButton"
                                                                                    onclick="deleteFunction({{ $user->id }})">
                                                                                    <i class="nav-icon la la-trash"></i>
                                                                                    <span
                                                                                        class="nav-text">Delete</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                <th>IMAGE</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
                                                <th>ROLE</th>
                                                <th>ACTION</th>
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
