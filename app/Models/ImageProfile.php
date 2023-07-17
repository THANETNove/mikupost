<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user_image',
        'image_user',
    ];
}