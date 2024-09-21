<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = [
        "img",
        "zalo",
        "describe",
        "bank",
        "cate",
        "fullname",
        'number_bank',
        'website',
        'facebook',
        'identity',
        'category_id',
        'account_id',
        'is_Admin_Facebook',
        'identity_verification',
        'phone_verification',
        'link_facebook',
        'contract_id'
    ];

    protected $casts = [
        'identity' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'traders_categories', 'trader_id', 'category_id');
    }

    public function contract()
    {

        return $this->belongsTo(Contract::class);
    }

    public static function searchTrader($query)
    {
        $traders = Trader::query()->whereRaw("MATCH(fullname) AGAINST('$query' IN NATURAL LANGUAGE MODE)")
            ->paginate(12);

        if (count($traders) == 0) {
            $traders = Trader::query()->whereRaw("MATCH(zalo) AGAINST('$query*' IN BOOLEAN MODE)")
                ->paginate(12);
        }

        return $traders;
    }

}
