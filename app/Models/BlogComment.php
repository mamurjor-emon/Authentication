<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogComment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id',
        'user_id',
        'comment_id',
        'comment',
        'replay_comment'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replayComment(){
        return $this->hasMany(BlogComment::class, 'comment_id','id');
    }
}
