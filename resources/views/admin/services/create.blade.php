@extends('layouts._app')

@push('subheader')
    @push('title_page')
        Services
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

            @include('layouts.admin.side')

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
                                    <h3 class="card-title">Create Services</h3>
                                    <div class="card-toolbar">
                                        <a href="{{ route('schedule.index') }}"
                                            class="btn btn-light-primary font-weight-bolder mr-2">
                                            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
                                        <div class="btn-group">
                                            <button type="button" onclick="formSubmit()"
                                                class="btn btn-primary font-weight-bolder">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data"
                                    class="form" id="kt_form">
                                    <div class="card-body">
                                        @include('admin.services.fields')
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
