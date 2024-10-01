<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function komentar()
    {
        return $this->hasMany(CommentMedia::class);
    }

    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function download()
    {
        return $this->hasMany(Download::class);
    }
}
