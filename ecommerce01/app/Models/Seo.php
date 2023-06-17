<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_tag',
        'meta_discription',
        'meta_keyword',
        'google_varification',
        'google_analytics',
        'google_adsence',
        'alexa_vatification',
    ];
}
