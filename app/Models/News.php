<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    CONST STATUS = [
        '0'=> 'WAITING',
        '1'=> 'CANCEL',
        '2'=> 'ALLOW'
    ];

    protected $fillable = ['title', 'content', 'image', 'viewers', 'description', 'keywords','status'];

    public function getCurrentStatusAttribute()
    {
        return self::STATUS[$this->status];
    }
}
