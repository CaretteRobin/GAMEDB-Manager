<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {
    protected $table = 'genre';
    protected $fillable = ['name', 'deck', 'description'];
    public $timestamps = false;

    public function games() {
        return $this->belongsToMany(Game::class, 'game2genre', 'genre_id', 'game_id');
    }
}
