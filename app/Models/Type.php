<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'genre_id', 'name'];

    public function genre(){
        return $this->belongsTo('App\Models\Genre', 'genre_id', 'id');
    }

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'type_id', 'id');
    }
}
