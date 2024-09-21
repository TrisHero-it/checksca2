<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRemovePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'content',
        'images',
        'account_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
