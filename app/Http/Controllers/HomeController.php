<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Schedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
        // return view('vendor.laravelpwa.offline');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function book()
    {
        $bookings = Booking::select('schedule_id')->where('order_date', date("Y-m-d"))->get();
        $booked = array();
        foreach ($bookings as $booking) {
            array_push($booked, $booking->schedule_id);
        }
        $schedules = Schedule::whereNotIn('id', $booked)->get();

        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('user.book.create')->with('schedules', $schedules)->with('products', $products);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function schedule($date)
    {

        $bookings = Booking::select('schedule_id')->where('order_date', $date)->get();
        $booked = array();
        foreach ($bookings as $booking) {
            array_push($booked, $booking->schedule_id);
        }
        $schedules = Schedule::whereNotIn('id', $booked)->get();

        return $schedules;
    }



    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAApathYOU:APA91bHZzBQyj8EuFATUTPJqvXnrZtUKEaEanx-KwfBqTpdMf9jCeb2Ji9Q2-DlLtdoK930iU-93xApPIgWxv57PKImUWaUaFJLIyOuQSo7BRNEBnwyDuCOR0ofCYlY7Ph-yFL3EuyVf';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
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
}
