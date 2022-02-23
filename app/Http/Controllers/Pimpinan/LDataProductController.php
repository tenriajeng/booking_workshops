<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class LDataProductController extends Controller
{
    public function index()
    {
        $data = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.name as categoriesName',
                'products.name as productsName',
                'products.price',
                'products.id',
                'products.description',
                'products.image',
                'products.status',
                'products.stock',
            )
            ->get();

        $jumlah = 0;

        return view('pimpinan.LDataProduct', compact('data', 'jumlah'));
    }

    public function cek(Request $request)
    {
        $datepicker = $request->datepicker;
        $bln = $datepicker."-01";
        $tglawal = date('Y-m-d', strtotime($bln));
        $tglakhir = date('Y-m-t', strtotime($bln));

        $data = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.name as categoriesName',
                'products.name as productsName',
                'products.price',
                'products.id',
                'products.description',
                'products.image',
                'products.status',
                'products.stock',
            )
            ->whereBetween('products.updated_at', [$tglawal, $tglakhir])->get();
        $jumlah = $data->count();
        $request->session()->put('data', $data);
        $request->session()->put('tglawal', $tglawal);
        $request->session()->put('tglakhir', $tglakhir);

        return view('pimpinan.LDataProduct', compact('data', 'jumlah'));
    }

    public function laporan(Request $request)
    {
        $data = $request->session()->get('data');
        $tglawal = $request->session()->get('tglawal');
        $tglakhir = $request->session()->get('tglakhir');

        $pdf = PDF::loadView('pimpinan.laporan.productPDF', compact('data', 'tglawal', 'tglakhir'))->setPaper('folio', 'portrait');
        return $pdf->stream("Laporan Product ".$tglawal." - ".$tglakhir.".pdf");
    }
}
