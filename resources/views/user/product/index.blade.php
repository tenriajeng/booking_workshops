@extends('layouts._app')

@push('page_style')
    @include('layouts.user.css')
@endpush

@section('content')
    @include('sweetalert::alert')

    <!-- Page Content -->
    <section id="page-content">
        <div class="container">
            <div class="row">
                @foreach ($data as $key => $product)
                    <div class="col-4">
                        <div class="card" style="border-radius: 14px">
                            <div class="card-body" style="display: flex;flex-direction: column">
                                <img src="{{ $product->image }}" width="100%"
                                    style="border: 2px solid #000;border-radius: 14px; margin-bottom: 10px">
                                <span
                                    style="width: 40%; font-size: 12px; padding: 0px 6px; background-color: black; color: white; border-radius: 5px;">
                                    {{ $product->category->name }}
                                </span>
                                <span style="font-weight: 600">
                                    {{ $product->name }}
                                </span>
                                <span style="font-weight: 600">
                                    Stok {{ $product->stock }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
