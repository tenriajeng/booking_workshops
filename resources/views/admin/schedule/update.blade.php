@extends('layouts._app')

@push('subheader')
    @push('title_page')
        schedule
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
                                    <h3 class="card-title">Update schedule</h3>
                                </div>
                                <!--begin::Form-->
                                <form action="{{ route('schedule.update', $data->id) }}" method="post"
                                    enctype="multipart/form-data" class="form" id="kt_form">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="card-body">
                                        @include('admin.schedule.fields')
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-8 ml-lg-auto">
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
