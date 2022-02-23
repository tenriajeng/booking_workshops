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
    }

    public function cek(Request $request)
    {
        $datepicker = $request->datepicker;
        $bln = $datepicker."-01";
        $tglawal = date('Y-m-d', strtotime($bln));
        $tglakhir = date('Y-m-t', strtotime($bln));

        $data = Booking::whereBetween('created_at', [$tglawal, $tglakhir])->get();
        $jumlah = $data->count();
        $request->session()->put('data', $data);
        $request->session()->put('tglawal', $tglawal);
        $request->session()->put('tglakhir', $tglakhir);

        return view('pimpinan.LDataTransaksi', compact('data', 'jumlah'));
    }

    public function laporan(Request $request)
    {
        $data = $request->session()->get('data');
        $tglawal = $request->session()->get('tglawal');
        $tglakhir = $request->session()->get('tglakhir');

        $pdf = PDF::loadView('pimpinan.laporan.transaksiPDF', compact('data', 'tglawal', 'tglakhir'))->setPaper('folio', 'portrait');
        return $pdf->stream("Laporan Transaksi ".$tglawal." - ".$tglakhir.".pdf");
    }
}
