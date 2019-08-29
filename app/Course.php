<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }

    public function materials()
    {
    	return $this->hasMany(Material::class);
    }
}
