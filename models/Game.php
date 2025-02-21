<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    protected $table = 'game'; 
    protected $fillable = ['name', 'description_short', 'description_long', 'release_date', 'expected_date'];

    public function genres() {
        return $this->belongsToMany(Genre::class, 'game2genre', 'game_id', 'genre_id');
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class, 'game2platform', 'game_id', 'platform_id');
    }

    public function companies() {
        return $this->belongsToMany(Company::class, 'game_developers', 'game_id', 'comp_id');
    }

    public function characters() {
        return $this->belongsToMany(Character::class, 'game2character', 'game_id', 'character_id');
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class, 'game2rating', 'game_id', 'rating_id');
    }
}