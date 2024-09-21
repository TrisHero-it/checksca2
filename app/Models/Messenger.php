<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Messenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_contract_id',
        'account_id',
        'content',
        'image'
    ];

   public function account()
   {

       return $this->belongsTo(Account::class);
   }


}
