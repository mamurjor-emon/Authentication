<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon',
        'name',
        'sub_name',
        'description',
        'image',
        'order_by',
        'status',
    ];
    public function doctors()
    {
        return $this->hasMany(DoctorModel::class, 'department_id', 'id')->with('user');
    }
}
