<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingProduct;
use App\Models\Product;
use App\Models\Services;
use App\Models\User;
use App\Notifications\TaskStatusUpdated;
use App\Notifications\WhatsAppNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Type\ObjectType;
use Twilio\Rest\Client;


class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Booking::orderBy('updated_at', 'DESC')->get();
        // dd($data);
        // $produk = BookingProduct::where('booking_id', $data->id)->get();
        // dd($data);
        return view('admin.booking.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Product::where('status', 1)->get();
        $data = null;
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.booking.create')->with('data', $data)->with('products', $products);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
            'services_id' => 'required|numeric',
            // 'product_name' => 'required',
            'keterangan' => 'required',
            // 'price' => 'required|numeric',
            'status' => 'required|numeric',
            'order_date' => 'required',
        ]);

        $dataRecord = $request->all();
        // dd($dataRecord);
        $price = 0;
        $product_name = "";

        if (isset($dataRecord['product'])) {
            $product_name = [];
            foreach ($dataRecord['product'] as $index => $product_id) {
                $product = Product::find($product_id);
                $product_name[$index] = $product->name;
                $price += $product->price;
            }
            $product_name = implode(" & ", $product_name);
        } else {
            $product_name = "";
        }

        $order_date = date_create($dataRecord['order_date']);
        $dataRecord['order_date'] = $order_date;
        $dataBook = Booking::where('status', '!=', '3')->where('schedule_id', $dataRecord['schedule_id'])->whereDate('order_date', $order_date)->first();

        $service = Services::find($dataRecord['services_id']);
        $price += $service->price;

        $ppn = $price * 0.1;
        $total = $price + $ppn;

        //  dd($dataRecord);
        if (is_null($dataBook)) {
            // $book = Booking::create($dataRecord);
            $book = Booking::create([
                'user_id' => $request->user_id,
                'schedule_id' => $request->schedule_id,
                'services_id' => $request->services_id,
                'product_name' => $product_name,
                'keterangan' => $request->keterangan,
                'price' => $total,
                'order_date' => $request->order_date,
                'status' => 1,
            ]);

            if (isset($dataRecord['product'])) {
                foreach ($dataRecord['product'] as $product_id) {
                    $product = Product::find($product_id);
                    $product->stock -= 1;
                    $price += $product->price;
                    $product->save();

                    $BookingProduct = new BookingProduct;
                    $BookingProduct->product_id = $product->id;
                    $BookingProduct->booking_id = $book->id;
                    $BookingProduct->product_name = $product->name;
                    $BookingProduct->price = $product->price;
                    $BookingProduct->save();
                }
            }
        } else {
            return back();
        }

        // return "ok";

        return redirect(route('booking.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Booking::where('id', $id)->first();
        // dd($data);
        $products = Product::orderBy('created_at', 'DESC')->get();
        $booking_products = BookingProduct::where('booking_id', $id)->get();

        return view('admin.booking.update')
            ->with('data', $data)
            ->with('products', $products)
            ->with('booking_products', $booking_products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'user_id' => "required|numeric",
            'schedule_id' => 'required|numeric',
            'services_id' => 'required|numeric',
            'status' => 'required|numeric',
            'order_date' => 'required',
        ]);

        $dataRecord = $request->all();

        $order_date = date_create($dataRecord['order_date']);
        $dataRecord['order_date'] = date('Y-m-d H:i:s', strtotime($dataRecord['order_date']));

        $dataBook = Booking::where('status', '!=', '3')->where('schedule_id', $dataRecord['schedule_id'])->whereDate('order_date', $order_date)->first();

        BookingProduct::where('booking_id', $id)->delete();

        $price = 0;
        if (isset($dataRecord['product'])) {
            foreach ($dataRecord['product'] as $product_id) {
                $product = Product::find($product_id);
                $product->stock -= 1;
                $price += $product->price;

                $product->save();
                $BookingProduct = new BookingProduct;
                $BookingProduct->product_id = $product->id;
                $BookingProduct->booking_id = $id;
                $BookingProduct->product_name = $product->name;
                $BookingProduct->price = $product->price;
                $BookingProduct->save();
            }
        }

        $service = Services::find($dataRecord['services_id']);
        $price += $service->price;

        $dataRecord['price'] = $price;
        $booking->update($dataRecord);

        $statusLabels = [
            1 => 'Book',
            2 => 'Process',
            3 => 'Finished',
            4 => 'Cancel',
            5 => 'di Setujui',
        ];

        $statusMessages = [
            1 => 'Your service booking is confirmed. We look forward to serving you.',
            2 => 'Your service is in progress. We\'ll update you shortly.',
            3 => 'Your service is finished. Thank you for choosing our services.',
            4 => 'Unfortunately, your service has been canceled. If you have any concerns, please contact us.',
            5 => 'Your service request has been approved. We\'ll proceed accordingly.',
        ];

        $status = $statusLabels[$dataRecord['status']] ?? '';
        $message = $statusMessages[$dataRecord['status']] ?? '';

        $this->sendNotification($dataRecord['user_id'], $status, $message);



        $user = User::find($dataRecord['user_id']);
        $phone = $user->phone ?? '85796196958';

        // $user = auth()->user();
        // dd($user);
        $user->notify(new TaskStatusUpdated($booking));
        // $user->email

        $sid    = "ACa090cb3389dc25df41b252093508b818";
        $token  = "08a8be4b447b03e6ac4d5c16d8cf7da9";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                "whatsapp:+62" . $phone, // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => "Hello " . $user->name . ', ' . $message . " Details: " . route('book.show', $id)
                )
            );
        // 6282158238890
        // 6285796196958 

        // dd($message);
        return redirect(route('booking.index'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification($user_id, $title, $message)
    {
        $firebaseToken = User::where('id', $user_id)->get()->pluck('device_token');

        $SERVER_API_KEY = 'AAAApathYOU:APA91bHZzBQyj8EuFATUTPJqvXnrZtUKEaEanx-KwfBqTpdMf9jCeb2Ji9Q2-DlLtdoK930iU-93xApPIgWxv57PKImUWaUaFJLIyOuQSo7BRNEBnwyDuCOR0ofCYlY7Ph-yFL3EuyVf';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $message,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return ($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();

        return redirect(route('booking.index'));
    }
}
