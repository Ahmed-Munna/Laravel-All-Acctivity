<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'prouct_name',
        'product_short_dis',
        'product_long_dis',
        'price',
        'product_img',
        'product_slug',
        'product_category_id',
        'product_subtegory_id'
    ];
}
