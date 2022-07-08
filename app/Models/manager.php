<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    protected $table='managers';
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
        return $this->belongsTo( invoice::class, 'manager_id');
    }
}
