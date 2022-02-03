@extends('layouts._app')

@push('title_page')
    Category
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
                            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                                <div class="card-header">
                                    <h3 class="card-title">Create Category</h3>
                                    <div class="card-toolbar">
                                        <a href="{{ route('category.index') }}"
                                            class="btn btn-light-primary font-weight-bolder mr-2">
                                            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
                                        <div class="btn-group">
                                            <button type="button" onclick="formSubmit(1)"
                                                class="btn btn-primary font-weight-bolder">
                                                <i class="ki ki-check icon-xs"></i>Save And Publish</button>
                                            <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="nav nav-hover flex-column">
                                                    <li class="nav-item">
                                                        <a onclick="formSubmit(0)" class="nav-link deleteButton">
                                                            <i class="nav-icon flaticon-doc"></i>
                                                            <span class="nav-text">Save Draft</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Form-->
                                <form class="form" action="{{ route('category.store') }}" method="POST"
                                    id="kt_form">
                                    @csrf
                                    <div class="card-body">
                                        @include('admin.category.fields')
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
