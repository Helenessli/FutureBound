<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'scholarship_tags', 'scholarship_id', 'tag_id');
    }
}
