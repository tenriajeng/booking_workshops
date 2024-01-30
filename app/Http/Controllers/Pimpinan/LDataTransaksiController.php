<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LDataTransaksiController extends Controller
{
    public function index()
    {
        $data = Booking::latest()->get();
        $jumlah = 0;
        return view('pimpinan.LDataTransaksi', compact('data', 'jumlah'));

        // $data = DB::table('bookings')
        //     ->join('categories', 'categories.id', '=', 'products.category_id')
        //     ->select(
        //         'categories.name as categoriesName',
        //         'products.name as productsName',
        //         'products.price',
        //         'products.id',
        //         'products.description',
        //         'products.image',
        //         'products.status',
        //         'products.stock',
        //     )
        //     ->get();

        // $jumlah = 0;

        // return view('pimpinan.LDataProduct', compact('data', 'jumlah'));
    }

    public function cek(Request $request)
    {
        // if(is_null($request))
        // {}

        // $datepicker = $request->datepicker;
        // $bln = $datepicker . "-01";
        // $tglawal = date('Y-m-d', strtotime($bln));
        // $tglakhir = date('Y-m-t', strtotime($bln));

        // $data = Booking::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        // $jumlah = $data->count();
        // $request->session()->put('data', $data);
        // $request->session()->put('tglawal', $tglawal);
        // $request->session()->put('tglakhir', $tglakhir);

        $datepicker = $request->datepicker;
        $bln = $datepicker . "-01";
        $tglawal = date('Y-m-d', strtotime($bln));
        $tglakhir = date('Y-m-t', strtotime($bln));

        $data = Booking::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        $jumlah = $data->count();

        if ($jumlah > 0) {
            // Data ditemukan, lakukan sesuatu dengan data
            $request->session()->put('data', $data);
            $request->session()->put('tglawal', $tglawal);
            $request->session()->put('tglakhir', $tglakhir);
        } else {
            // Tidak ada data ditemukan, berikan pesan kepada pengguna
            $request->session()->flash('message', 'Tidak ada data ditemukan untuk bulan ini.');
        }

        return view('pimpinan.LDataTransaksi', compact('data', 'jumlah'));
    }

    public function laporan(Request $request)
    {
        $data = $request->session()->get('data');
        $tglawal = $request->session()->get('tglawal');
        $tglakhir = $request->session()->get('tglakhir');

        $pdf = PDF::loadView('pimpinan.laporan.transaksiPDF', compact('data', 'tglawal', 'tglakhir'))->setPaper('folio', 'portrait');
        return $pdf->stream("Laporan Transaksi " . $tglawal . " - " . $tglakhir . ".pdf");
    }
}
