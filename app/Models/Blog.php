<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'sub_title',
        'f_discrption',
        'f_image',
        'l_image',
        's_discrption',
        't_discrption',
        'l_discrption',
        'socal_media',
        'tag',
        'order_by',
        'status'
    ];
}
