<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'stripe_charge_id',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'payment_details'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function isSuccessful()
    {
        return $this->payment_status === 'succeeded';
    }
}
