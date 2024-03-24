<?php

namespace App\Models;

use App\Models\ProtfolioGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioSection extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'client_name',
        'date',
        'phone',
        'age',
        'title',
        'btn_title',
        'btn_url',
        'btn_target',
        'order_by',
        'discription',
        'status',
        'image',
    ];
    public function galleryImages(){
        return $this->hasMany(ProtfolioGallery::class,'portfolio_id','id');
    }
}
