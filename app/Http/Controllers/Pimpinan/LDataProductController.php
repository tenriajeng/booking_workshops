<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('pimpinan.LDataProduct', compact('data'));
    }
}
