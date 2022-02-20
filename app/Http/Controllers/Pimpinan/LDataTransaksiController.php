<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;


class LDataTransaksiController extends Controller
{
    public function index()
    {

        // $data = DB::table('bookings')
        // ->where('status', '1')
        // ->get();
        $data = Booking::orderBy('updated_at', 'DESC')->get();

        // dd($data);
        return view('pimpinan.LDataTransaksi', compact('data'));
    }
}
