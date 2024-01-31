<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'system', 'description'];

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'difficulty_id', 'id');
    }
}
