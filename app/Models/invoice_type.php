<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_type extends Model
{
    protected $table='invoice_type';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'invoice_type'
    ];

    protected $hidden =[ 'id','created_at',
        'updated_at'];
    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( invoice::class, 'type_id');
    }
}
