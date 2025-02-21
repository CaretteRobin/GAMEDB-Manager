<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {
    protected $table = 'genres';
    protected $fillable = ['name', 'description_short', 'description_long'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game2genre', 'genre_id', 'game_id');
    }
}
