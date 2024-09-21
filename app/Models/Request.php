<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'zalo',
        'facebook',
        'website',
        'describe',
        'img',
        'fullname',
        'bank',
        'fee',
        'trader_id',
    ];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }
}
