<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class LDataPenggunaController extends Controller
{
    public function index()
    {

        $data = User::all();

        return view('pimpinan.LDataPengguna', compact('data'));
    }

    public function laporan()
    {

        $user = User::all();
        $data = compact('user');

        $pdf = PDF::loadView('pimpinan.laporan.penggunaPDF', $data)->setPaper('folio', 'portrait');
        return $pdf->stream("Laporan Pengguna MARANNU MOBIL" . '.pdf');
    }
}
