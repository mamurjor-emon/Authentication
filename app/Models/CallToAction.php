<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sub_title',
        'f_btn_title',
        'f_btn_url',
        'f_btn_target',
        'l_btn_title',
        'l_btn_url',
        'l_btn_target',
        'status'
    ];
}
