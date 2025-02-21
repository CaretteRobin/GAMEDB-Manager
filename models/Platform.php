<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model {
    protected $table = 'platforms';
    protected $fillable = ['name', 'alias', 'description_short', 'description_long', 'release_date', 'initial_price', 'installed_base'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game2platform', 'platform_id', 'game_id');
    }
}