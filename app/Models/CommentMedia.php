<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMedia extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // A comment can have replies (self-relation)
    public function replies()
    {
        return $this->hasMany(CommentMedia::class, 'parent_id');
    }

    // A comment belongs to a parent comment
    public function parent()
    {
        return $this->belongsTo(CommentMedia::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeCommentMedia::class);
    }
}
