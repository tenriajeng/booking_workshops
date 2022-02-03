@extends('layouts._app')

@push('page_style')
    @include('layouts.user.css')
@endpush

@section('content')
    @include('sweetalert::alert')

    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        @include('layouts.user.header')
        <!--end: Inspiro Slider -->
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
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $product)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> <img src="{{ $product->image }}" height="70"></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->stock }}</td>
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
        <!-- Footer -->
        @include('layouts.user.footer')
        <!-- end: Footer -->
    </div>

@endsection

@push('page_script')
    @include('layouts.user.js')
@endpush
