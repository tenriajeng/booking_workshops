@extends('layouts._app')

@push('page_style')
@include('layouts.user.css')
@endpush

<div class="body-inner">
    <!-- Header -->
    @include('layouts.user.header')
    @section('content')
    <!-- Page Content -->
    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Order List</h3>
                            <div style="overflow-x:auto;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Jenis Service</th>
                                            <th>Keterangan</th>
                                            <th>Price</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $booking)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $booking->id }}</td>
                                            <td>
                                                {{ date('j F, Y', strtotime( $booking->order_date)) }}
                                            </td>
                                            <td>
                                                @if ($booking->status == 1)
                                                Book
                                                @elseif ($booking->status == 2)
                                                Process
                                                @elseif ($booking->status == 3)
                                                Done
                                                @elseif ($booking->status == 4)
                                                Cancel
                                                @elseif ($booking->status == 5)
                                                di Setujui
                                                @endif
                                            </td>
                                            <td>
                                                {{ App\Models\Services::find($booking->services_id)->name}}
                                            </td>
                                            <td>{{ $booking->keterangan }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>
                                                <a href="{{ route('book.show',$booking->id) }}" class="btn">Detail</a>
                                            </td>
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
    @endsection

    <!-- end: Page Content -->
    <!-- Footer -->
    @include('layouts.user.footer')
    <!-- end: Footer -->
</div>


@push('page_script')
@include('layouts.user.js')
@endpush