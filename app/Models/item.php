<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table='items';
    public $timestamps=true;

    public $incrementing = true;

    protected $fillable = [
        'discount','name','price'
    ];

    protected $hidden =[ 'id','created_at',
        'updated_at'];
    public function invoice_items(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo( invoice_item::class, 'item_id');
    }
}
