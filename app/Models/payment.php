<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table='invoices';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'invoice_id', 'deserved_amount', 'received_amount', 'remainder', 'payment_date'
    ];

    protected $hidden =[ 'id','invoice_id','created_at',
        'updated_at'];

    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(invoice::class,'invoice_id');
    }
}
