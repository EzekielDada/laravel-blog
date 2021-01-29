<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    public function blogposts()
    {
        return $this->hasOne('App\Models\Blogposts', 'authors_id');
    }
}
