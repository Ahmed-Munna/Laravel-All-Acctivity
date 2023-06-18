<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageCreation extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_name',
        'page_title',
        'page_slug',
        'page_discription',
    ];
}
