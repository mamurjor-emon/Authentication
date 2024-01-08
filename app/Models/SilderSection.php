<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SilderSection extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_title',
        'f_spcial_title',
        'l_title',
        'l_spcial_title',
        'description',
        'f_btn_title',
        'f_btn_url',
        'f_btn_target',
        'l_btn_title',
        'l_btn_url',
        'l_btn_target',
        'image',
        'order_by',
        'status',
    ];
}
