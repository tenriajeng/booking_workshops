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
                                <h3>Order Detail</h3>
                                <div style="overflow-x:auto;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>

                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->booking_id }}</td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->created_at }}</td>
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
