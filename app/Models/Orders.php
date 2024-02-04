<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_id',
        'price',
        'quantity',
        'total_price',
        'status',
        'order_submission_date',
    ];
}
