<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'short_desc', 'description', 'price', 'thumbnail', 'instructor_id'];
    
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function contents()
{
    return $this->hasMany(Content::class);
}
}
