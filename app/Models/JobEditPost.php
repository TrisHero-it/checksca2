<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEditPost extends Model
{
    use HasFactory;

    CONST STATUS = [
        'waiting', 'cancel', 'success'
    ];

    protected $fillable = [
        'account_id',
        'post_id',
        'username',
        'linkfb',
        'fullname',
        'numberphone',
        'numberbank',
        'namebank',
        'new_images',
        'delete_old_images',
        'moneys_scam',
        'content',
        'category_id',
        'status'
    ];

    protected $casts = [
        'new_images' => 'array',
        'delete_old_images' => 'array',
    ];

    public function getNameStatusAttribute()
    {
        foreach (self::STATUS as $status) {
            if ($this->status == $status) {
                return $status;
            }
        }
    }
}
