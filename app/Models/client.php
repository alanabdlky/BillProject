<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table='clients';
    public $timestamps=true;
    public $incrementing = true;

    protected $fillable = [
        'name','company_name','number_phone'
    ];

    protected $hidden =[ 'id','created_at',
        'updated_at'];
    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( invoice::class, 'client_id');
    }
}
