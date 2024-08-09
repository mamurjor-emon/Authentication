<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimePageModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'day_id',
        'time_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function time(){
        return $this->belongsTo(TimeTable::class);
    }
    public function day(){
        return $this->belongsTo(DayModel::class);
    }
}
