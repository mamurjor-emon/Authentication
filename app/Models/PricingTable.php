<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingTable extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon',
        'title',
        'price',
        'price_label',
        'discrption',
        'btn_title',
        'btn_url',
        'btn_target',
        'order_by',
        'status'
    ];
}
