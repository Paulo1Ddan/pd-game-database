<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "name", "console", "gender", "type", "date", "time", "score", "difficulty", "condition", "cover"];
}
