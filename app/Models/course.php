<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
