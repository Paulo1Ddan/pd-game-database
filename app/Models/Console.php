<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'img'];

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'console_id', 'id');
    }
}
