<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailContract extends Model
{
    use HasFactory;

    const STATUS = [
        [
            'status' => 'Đang mở',
            'color' => '#7BC0FF',
            'background' => '#003D74'
        ],
        [
            'status' => 'Tranh chấp',
            'color' => '#FFC06D',
            'background' => '#6C3D00'
        ],
        [
            'status' => 'Huỷ',
            'color' => '#FF8989',
            'background' => '#6B2323'
        ],

        [
            'status' => 'Hoàn thành',
            'color' => '#66E882',
            'background' => '#00501B'
        ],
    ];

    protected $fillable = [
        "category_id",
        "name",
        "moneys",
        "infor_buyer",
        "infor_seller",
        "content",
        "status",
        'account_id',
        'stage',
        'security_code',
        'trader_id'
    ];

    protected $casts = [
        'infor_buyer' => 'array',
        'infor_seller' => 'array',
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function account()
    {

        return $this->belongsTo(Account::class);
    }

    public function messenger()
    {

        return $this->hasMany(Messenger::class);
    }

    public function getAccountSellerAttribute()
    {
        $seller = $this->infor_seller;
        $account = Account::query()->where('email', $seller['email'])->first();

        return $account;
    }

    public function getAccountBuyerAttribute()
    {
        $buyer = $this->infor_buyer;
        $account = Account::query()->where('email', $buyer['email'])->first();

        return $account;
    }

    public function trader()
    {

        return $this->belongsTo(Trader::class);
    }

    public function count()
    {

        return $this->messenger()->where('seen', 0)->count();
    }

    public function getStatus($status_detail)
    {
        $statuses = self::STATUS;
        $stt = 0;
        foreach ($statuses as $status) {
            if ($status_detail['status'] == $stt) {
                return $status['status'];
            }
            $stt++;
        }
    }

    public function getBackground($status_detail)
    {
        $statuses = self::STATUS;
        $stt = 0;
        foreach ($statuses as $status) {
            if ($status_detail['status'] == $stt) {
                return $status['background'];
            }
            $stt++;
        }
    }

    public function getColor($status_detail)
    {
        $statuses = self::STATUS;
        $stt = 0;
        foreach ($statuses as $status) {
            if ($status_detail['status'] == $stt) {
                return $status['color'];
            }
            $stt++;
        }
    }

}
