<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        // $input['schedule_id'] = $input['time'];
        $input['schedule_id'] = $input['time'];
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 1;
        $price = 0;

        if (isset($input['product'])) {
            $product_name = [];
            foreach ($input['product'] as $index => $product_id) {

                $product = Product::find($product_id);
                $price += $product->price;
                $product_name[$index] = $product->name;
            }
            $product_name = implode(" & ", $product_name);
        } else {
            $product_name = [];
        }


        // dd($input);
        // $book = Booking::create($input);
        $book = Booking::create([
            'user_id' => Auth::user()->id,
            'schedule_id' => $input['schedule_id'],
            'services_id' => $request->services_id,
            'product_name' => $product_name,
            'keterangan' => $request->keterangan,
            'price' => $price,
            'order_date' => $request->order_date,
            'status' => 1,
        ]);

        if (isset($input['product'])) {
            foreach ($input['product'] as $product_id) {
                $product = Product::find($product_id);
                $product->stock -= 1;
                $product->save();


                $BookingProduct = new BookingProduct;
                $BookingProduct->product_id = $product->id;
                $BookingProduct->booking_id = $book->id;
                $BookingProduct->product_name = $product->name;
                $BookingProduct->price = $product->price;
                $BookingProduct->save();
            }
        }




        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
