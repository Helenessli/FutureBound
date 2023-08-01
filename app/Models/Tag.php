<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function scholarships()
    {
        return $this->belongsToMany(Scholarship::class, 'scholarship_tags', 'tag_id', 'scholarship_id');
    }
}
