<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_item extends Model
{
    protected $table='invoice_item';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'quantity'
    ];

    protected $hidden =[ 'id','invoice_id','item_id','created_at',
        'updated_at'];
    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(invoice::class,'invoice_id');
    }
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(item::class,'item_id');
    }
}
