<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class LDataProductController extends Controller
{
    public function index(Request $request)
    {
        // $data = DB::table('products')
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
        $data = DB::table('booking_products')
            ->join('bookings', 'bookings.id', '=', 'booking_products.booking_id')
            ->join('products', 'products.id', '=', 'booking_products.product_id')
            ->select(
                'booking_products.id as bookingProductId',
                'bookings.id as bookingId',
                'products.id as productId',
                'products.name as productsName',
                'products.image',
                'products.price',
                'products.description',
                'products.status',
                'products.stock'
            )
            ->get();

        $request->session()->put('data', $data);


        $jumlah = count($data);

        return view('pimpinan.LDataProduct', compact('data', 'jumlah'));
    }

    public function cek(Request $request)
    {
        $datepicker = $request->datepicker;
        $bln = $datepicker . "-01";
        $tglawal = date('Y-m-d', strtotime($bln));
        $tglakhir = date('Y-m-t', strtotime($bln));

        $data = DB::table('booking_products')
            ->join('bookings', 'bookings.id', '=', 'booking_products.booking_id')
            ->join('products', 'products.id', '=', 'booking_products.product_id')
            ->select(
                'booking_products.id as bookingProductId',
                'bookings.id as bookingId',
                'products.id as productId',
                // 'products.category as categoriesName',
                'products.name as productsName',
                'products.image',
                'products.price',
                'products.description',
                'products.status',
                'products.stock'
            )
            ->where('bookings.status', 3)
            ->whereBetween('products.updated_at', [$tglawal, $tglakhir])->get();
        // dd($data);
        $jumlah = $data->count();
        $request->session()->put('data', $data);
        $request->session()->put('tglawal', $tglawal);
        $request->session()->put('tglakhir', $tglakhir);
        if ($jumlah > 0) {
            // Data ditemukan, lakukan sesuatu dengan data

        } else {
            // Tidak ada data ditemukan, berikan pesan kepada pengguna
            $request->session()->flash('message', 'Tidak ada data ditemukan untuk bulan ini.');
        }

        return view('pimpinan.LDataProduct', compact('data', 'jumlah'));
    }

    public function laporan(Request $request)
    {
        $data = $request->session()->get('data');
        $tglawal = $request->session()->get('tglawal');
        $tglakhir = $request->session()->get('tglakhir');

        $pdf = PDF::loadView('pimpinan.laporan.productPDF', compact('data', 'tglawal', 'tglakhir'))->setPaper('folio', 'portrait');
        return $pdf->stream("Laporan Product " . $tglawal . " - " . $tglakhir . ".pdf");
    }
}
