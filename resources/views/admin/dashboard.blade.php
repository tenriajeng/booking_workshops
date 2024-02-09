@extends('layouts.app')

@push('title_page')
    Dashboard
@endpush

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-users" style="color: white"></i>
                            </span>
                            <span
                                class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">{{ $users }}</span>
                            <span class="font-weight-bold text-light font-size-sm">Total User </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-wrench" style="color: white"></i>
                            </span>
                            <span
                                class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">{{ $services }}</span>
                            <span class="font-weight-bold text-light font-size-sm">Total Service </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-clock" style="color: white"></i>
                            </span>
                            <span
                                class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">{{ $schedules }}</span>
                            <span class="font-weight-bold text-light font-size-sm">Total Schedule </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-calendar" style="color: white"></i>
                            </span>
                            <span class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">
                                {{ $bookings }}
                            </span>
                            <span class="font-weight-bold text-light font-size-sm">Total Booking </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-shopping-bag" style="color: white"></i>
                            </span>
                            <span
                                class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">{{ $products }}</span>
                            <span class="font-weight-bold text-light font-size-sm">Total Product </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card card-custom bg-primary card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <i class="fas fa-folder" style="color: white"></i>
                            </span>
                            <span
                                class="card-title font-weight-bolder text-light font-size-h2 mb-0 mt-6 d-block">{{ $categories }}</span>
                            <span class="font-weight-bold text-light font-size-sm">Total Category </span>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
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
