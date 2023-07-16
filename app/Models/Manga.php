<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_photo',
        'manga_name',
        'manga_details',
        'author',
        'status',
        'categories_id',
        'views',
        'website',
    ];
}