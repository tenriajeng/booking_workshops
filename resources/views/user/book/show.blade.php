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
                                            <td> @currency($item->price)</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                        @endforeach
                                        @if ($data->count() == 0)
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Tidak Ada produk
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td colspan="3" class="text-right">
                                                {{-- format curency --}}

                                                service {{ App\Models\Booking::find($id)->service->name }}
                                            </td>
                                            <td colspan="2" class="text-left">
                                                @currency(App\Models\Booking::find($id)->service->price)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">PPN 10%</td>
                                            <td colspan="2" class="text-left">
                                                @currency($ppn)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Price</td>
                                            <td colspan="2" class="text-left">
                                                @currency(App\Models\Booking::find($id)->price)
                                            </td>
                                        </tr>
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