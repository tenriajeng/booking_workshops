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
        <h3>Laporan Transaksi <b>MARANNU MOBIL</b></h3>
    </center>
    <center>
        <h6>Tanggal : {{ $tglawal }} s/d {{ $tglakhir }}</h6>
    </center>
    <br>
    <table border="1" width="100%" style="text-align:center" cellpadding="0" class="tabel1" cellspacing="0">
        <thead>
            <tr class="center">
                <th width="30px">No</th>
                <th width="90px">Nama</th>
                <th width="90px">Bayar</th>
                <th width="40px">Status</th>
                <th width="80px">Tanggal Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $no => $item)
                @if ($item->status == 3)
                    @php
                        $status = $item->status == 3 ? 'Finished' : '';
                    @endphp
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td style="text-align: right">Rp.{{ number_format($item->price, 0) }}&nbsp;</td>
                        <td>{{ $status }}</td>
                        <td>{{ $item->order_date }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
