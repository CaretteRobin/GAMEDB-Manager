<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model {
    protected $table = 'character';
    protected $fillable = ['name', 'real_name', 'last_name', 'alias', 'birthday', 'gender', 'deck', 'description', 'first_appeared_in_game_id', 'created_at', 'updated_at'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game2character', 'character_id', 'game_id');
    }
}