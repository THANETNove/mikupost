<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga_episode extends Model
{
    use HasFactory;
    protected $fillable = [
        'mangesId',
        'episodeId',
        'episode_name',
        'episode_name_image',
        'foldedManges',
        'view',
    ];
}