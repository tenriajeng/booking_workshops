{{-- @extends('layouts.user.app')

@section('content')
<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Product List</h3>
                        <div style="overflow-x:auto;">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $product)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td> <img src="{{ $product->image }}" height="70"></td>
                                        <td>{{ $product->categoriesName }}</td>
                                        <td>{{ $product->productsName }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Page Content -->
@endsection --}}



@extends('pimpinan.layout.home')

@push('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive_lecturer.js') }}"></script>
@endpush

@push('title_page')
User
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Laporan Data Product</h3>
        </div>

    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $product)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td> <img src="{{ $product->image }}" height="70"></td>
                    <td>{{ $product->categoriesName }}</td>
                    <td>{{ $product->productsName }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->status }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable-->
    </div>
</div>
@endsection