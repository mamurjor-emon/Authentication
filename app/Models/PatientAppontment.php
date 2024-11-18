<?php

namespace App\Models;

use App\Models\User;
use App\Models\SlotModel;
use App\Models\DoctorModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientAppontment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'doctor_id',
        'slot_id',
        'date',
        'description',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,);
    }
    public function docotr(){
        return $this->belongsTo(DoctorModel::class,);
    }
    public function slot(){
        return $this->belongsTo(SlotModel::class,);
    }
}
