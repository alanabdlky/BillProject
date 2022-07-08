<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class accountant extends Authenticatable
{


    protected $table='accountants';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'number_phone',
        'address',
        'salary',
        'employed_date'
    ];

    protected $hidden =[ 'id','created_at',
        'updated_at'];
    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( invoice::class, 'accountant_id');
    }
}
