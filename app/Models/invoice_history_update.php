<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice_history_update extends Model
{
    protected $table='invoice_history_update';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'discount','tax','payment_status',
    ];

    protected $hidden =[ 'id','item_id','client_id','created_at',
        'updated_at'];

    public function clients(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(client::class,'client_id');
    }
    public function types(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(invoice_type::class,'type_id');
    }
}
