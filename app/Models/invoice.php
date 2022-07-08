<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table='invoices';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'discount','tax','payment_status',
    ];

    protected $hidden =[ 'id','accountant_id','manager_id','item_id','client_id','created_at',
        'updated_at'];


    public function accountants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(accountant::class, 'accountant_id');
    }
    public function managers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(manager::class,'manager_id');
    }
    public function clients(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(client::class,'client_id');
    }
    public function types(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(invoice_type::class,'type_id');
    }
    public function payments(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( payment::class, 'invoice_id');
    }
}
