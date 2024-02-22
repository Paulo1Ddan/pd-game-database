<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "name", "console_id", "genre_id", "type_id", "date", "time", "score_id", "difficulty_id", "condition", "cover"];

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }

    public function score()
    {
        return $this->belongsTo('App\Models\Score', 'score_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre', 'genre_id', 'id');
    }

    public function difficulty()
    {
        return $this->belongsTo('App\Models\Difficulty', 'difficulty_id', 'id');
    }

    public function console()
    {
        return $this->belongsTo('App\Models\Console', 'console_id', 'id');   
    }

    

}
