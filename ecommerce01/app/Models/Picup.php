<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picup extends Model
{
    use HasFactory;
    protected $fillable = [
        'picup_point_name',
        'picup_point_address',
        'picup_point_phone',
        'picup_point_aphone',
    ];
}
