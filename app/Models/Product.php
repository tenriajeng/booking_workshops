<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        // 'duration',
        'description',
        'image',
        'status',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        // return $this->belongsTo(Category::class);
    }
}
