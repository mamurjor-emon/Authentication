<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bullding_id',
        'room_no',
        'order_by',
        'status',
    ];

    public function bullding(){
        return $this->belongsTo(Bullding::class);
    }
}
