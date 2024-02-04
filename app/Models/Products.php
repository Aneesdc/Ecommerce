<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_description',
        'long_description',
        'category_name',
        'price',
        'sub_category_name',
        'product_category_id',
        'product_subcategory_id',
        'count',
        'image',
        'slug'
    ];
}
