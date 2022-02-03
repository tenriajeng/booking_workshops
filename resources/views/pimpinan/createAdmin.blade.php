@extends('layouts._app')

@push('subheader')
    @push('title_page')
        User
    @endpush
    @push('sub_title_page')
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Form</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Create</a>
            </li>
        </ul>
    @endpush
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
                            <div class="card card-custom example example-compact">
                                <div class="card-header">
                                    <h3 class="card-title">Create Admin</h3>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('pimpinan.store') }}" method="post" enctype="multipart/form-data"
                                    class="form" id="kt_form">
                                    <div class="card-body">
                                        @include('admin.user.fields')
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-9 ml-lg-auto">
                                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                                <button type="reset" class="btn btn-light-primary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
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
