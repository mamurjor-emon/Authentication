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
        'categorie_id',
        'user_id',
        'tag_ids',
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
        'total_view',
        'meta_title',
        'meta_keyword',
        'meta_discrption',
        'order_by',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categorie()
    {
        return $this->belongsTo(BlogCategories::class, 'categorie_id', 'id');
    }
}
