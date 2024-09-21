<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRemovePost extends Model
{
    use HasFactory;

    const STATUS = [
      0 => 'Đang chờ xử lí',
        1 => 'Bị huỷ',
        2 => 'Duyệt'
    ];

    protected $fillable = [
        'account_id',
        'post_id',
        'images',
        'content',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function account()
    {

        return $this->belongsTo(Account::class);
    }

    public function getCurrentStatusAttribute()
    {
        foreach (self::STATUS as $key => $status) {
            if ($this->status == $key) {
                return $status;
            }
        }
    }

    public function post()
    {

        return $this->belongsTo(Post::class);
    }
}
