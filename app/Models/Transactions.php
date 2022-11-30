<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'sub_total',
        'discount',
        'qty',
        'discount_cod',
        'status_pembayaran',
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
