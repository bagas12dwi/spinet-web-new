<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDiscussion extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function diskusi()
    {
        return $this->belongsTo(Discussion::class);
    }

    // A comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A comment can have replies (self-relation)
    public function replies()
    {
        return $this->hasMany(CommentDiscussion::class, 'parent_id');
    }

    // A comment belongs to a parent comment
    public function parent()
    {
        return $this->belongsTo(CommentDiscussion::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeCommentDiscussion::class);
    }
}
