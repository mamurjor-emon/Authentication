<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'department_id',
        'image',
        'phone',
        'location',
        'facebook',
        'twitter',
        'vimo',
        'pinterest',
        'position',
        'fdegree',
        'sdegree',
        'tdegree',
        'ldegree',
        'workday',
        'fbiography',
        'education',
        'lbiography',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function department(){
        return $this->belongsTo(DepartmentModel::class,'department_id','id');
    }
}
