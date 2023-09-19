@extends('layouts.app')

@push('title_page')
    Kategori
@endpush
@push('sub_title_page')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted">Form</a>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="" class="text-muted">Update</a>
        </li>
    </ul>
@endpush

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        @include('layouts.admin.subheader')
        <div class="d-flex flex-column-fluid">
            <div class="container">

                <!--begin::Content-->
                <div class="card card-custom example example-compact">
                    <div class="card-header">
                        {{-- <h3 class="card-title">{{ trans('crud.create') }} {{ trans('panel.category') }}</h3> --}}
                        <h3 class="card-title">Update Kategori</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('category.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
                            <div class="btn-group">
                                <button type="button" onclick="formSubmit(1)" class="btn btn-primary font-weight-bolder">
                                    <i class="ki ki-check icon-xs"></i>Save And Publish</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
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
                    <form action="{{ route('category.update', $data->id) }}" method="POST" id="kt_form">
                        @csrf
                        {{ method_field('PATCH') }}
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
@endsection

@push('page_style')
    @include('layouts.admin.css')
@endpush

@push('page_script')
    @include('layouts.admin.js')
@endpush
