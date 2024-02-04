<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;
    protected $table = "sub_category";
    public $timestamps = true;
    protected $fillable = [
        'sub_category_name',
        'category_name',
        'subcategory_product_count',
        'slug',
        'created_at',
        'updated_at'
    ];
}
