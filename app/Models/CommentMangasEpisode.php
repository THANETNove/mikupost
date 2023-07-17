<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMangasEpisode extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_comment_manges',
        'id_comment_episode',
        'comment',
    ];
}