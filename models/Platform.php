<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model {
    protected $table = 'platform';
    protected $fillable = ['name', 'alias', 'abbreviation', 'deck', 'description', 'c_id', 'install_base', 'release_date', 'online_support', 'original_price', 'created_at', 'updated_at'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game2platform', 'platform_id', 'game_id');
    }
}