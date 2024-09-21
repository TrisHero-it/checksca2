<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table='accounts';

    protected $fillable = [
        'avatar',
        'id',
        'name',
        'email',
        'uid',
        'password',
        'numcomments',
        'google_id',
        'ban',
        'verify_code',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function reports() {

        return $this->hasMany(Post::class);
    }

    public function midmans() {

        return $this->hasMany(DetailContract::class);
    }

    public function getCountOpenMidmanAttribute()
    {

        return $this->midmans()->where('status', 0)->count();
    }

    public function getCountSuccessMidmanAttribute()
    {

        return $this->midmans()->where('status', 3)->count();
    }

    public function getCountWaitingMidmanAttribute()
    {

        return $this->midmans()->where('status', 1)->count();
    }

    public function getCountCancelMidmanAttribute()
    {

        return $this->midmans()->where('status', 2)->count();
    }

    public function getCountReportsSuccessAttribute() {

        return $this->reports()->where('status_id', '3')->count();
    }

    public function getCountReportsFailAttribute() {

        return $this->reports()->where('status_id', '2')->count();
    }

    public function getCountReportsAttribute() {

        return $this->reports()->where('status_id', '1')->count();
    }
}
