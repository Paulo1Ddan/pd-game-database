<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'color'];

    public function types()
    {
        return $this->hasMany('App\Model\Type', 'genre_id', 'id');
    }
}
