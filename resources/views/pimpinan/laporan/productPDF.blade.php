<!DOCTYPE html>
<html>

<head>
    <title>Laporan MARANNU MOBIL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <style type="text/css">
        .tabel1 tr th {
            background: #86dcec;
        }

        .tabel1,
        th,
        td {
            text-align: center;
        }

        .tabel1 tr:nth-child(even) {
            background: #fffda4;
        }
    </style>

    <center>
        <h3>Laporan Produk <b>MARANNU MOBIL</b></h3>
    </center>
    <center>
        <h6>Tanggal : {{ $tglawal }} s/d {{ $tglakhir }}</h6>
    </center>
    <br>
    <table border="1" width="100%" style="text-align:center" cellpadding="0" class="tabel1" cellspacing="0">
        <thead>
            <tr class="center">
                <th width="30px">No</th>
                <th>Gambar</th>
                {{-- <th>Kategori</th> --}}
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Terjual</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $no => $product)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td> <img src="{{ $product->image }}" height="70"></td>
                    {{-- <td>{{ $product->categoriesName }}</td> --}}
                    <td>{{ $product->productsName }}</td>
                    <td style="text-align: right">Rp.{{ number_format($product->price, 0) }}&nbsp;</td>
                    <td>{{ $product->stock }}</td>
                    <td>

                        @php
                            $sold = 0;
                            $book_id = App\Models\Booking::where('status', 3)->get()->pluck('id')->toArray();
                            $sold = App\Models\BookingProduct::whereIn('booking_id', $book_id)
                                // ->where('product_id', $product->id)
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
    </table>
</body>

</html>
