<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {
    protected $table = 'game_rating';
    protected $fillable = ['name', 'rating_board_id'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game2rating', 'rating_id', 'game_id');
    }
}