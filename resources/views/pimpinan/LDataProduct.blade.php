@extends('layouts.p_app')

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
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Laporan per Bulan</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/pimpinan/laporanproduct" method="POST" class="form">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col">
                                                <label for="datepicker" class="form-control-label">Bulan</label>
                                                <input type="month" name="datepicker" class="form-control"
                                                    autocomplete="off" value="" required />
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="cek" class="btn btn-primary">Cek</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <!--begin::Content-->
                            {{-- @if ($jumlah > 0) --}}
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">Laporan Data Product</h3>
                                    </div>
                                    <div class="card-title margin-left">
                                        <a href="{{ route('laporan.product') }}" target="_blank"
                                            class="btn btn-outline-danger">Export PDF</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (session('message'))
                                        <p>{{ session('message') }}</p>
                                    @else
                                        <!--begin: Datatable-->
                                        <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    {{-- <th>Category</th> --}}
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Sold</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $product)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td> <img src="{{ $product->image }}" height="70"></td>
                                                        <td>{{ $product->productsName }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->stock }}</td>
                                                        <td>

                                                            @php
                                                                $sold = 0;
                                                                $book_id = App\Models\Booking::where('status', 3)->get()->pluck('id')->toArray();
                                                                $sold = App\Models\BookingProduct::whereIn('booking_id', $book_id)
                                                                    // ->where('productId', $product->id)
                                                                    ->get()
                                                                    ->count();
                                                            @endphp
                                                            {{ $sold }}

                                                        </td>
                                                        <td>{!! $product->description !!}</td>
                                                        <td>{{ $product->status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    {{-- <th>Category</th> --}}
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Sold</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!--end: Datatable-->
                                </div>
                            </div>
                            @endif
                            {{-- @if ($jumlah > 0) --}}

                            {{-- @endif --}}
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
