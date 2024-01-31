<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function types()
    {
        return $this->hasMany('App\Model\Type', 'genre_id', 'id');
    }

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'genre_id', 'id');
    }
}
