<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;
    // protected $table = "categories";
    protected $fillable = ['id','name','image'];
    const CATEGORY = ['name'=>'Tất cả các game',
        'image'=>'LoL.png'];

    public function getCategoryAttribute()
    {
        return self::CATEGORY;
    }

    public function traders() {

        return $this->belongsToMany(Trader::class);
    }
}
