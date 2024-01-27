<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'order_date',
        'start',
        'end',
        'schedule_id',
        'services_id',
        'product_name',
        'keterangan',
        'price',

    ];

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(BookingProduct::class, 'booking_id', 'id');
    }
}
