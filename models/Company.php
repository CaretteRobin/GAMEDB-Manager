<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'company';
    protected $fillable = ['name', 'alias', 'abbreviation', 'deck', 'description', 'date_founded', 'location_address', 'location_city', 'location_country', 'location_state', 'phone', 'website', 'created_at', 'updated_at'];

    public function developedGames() {
        return $this->belongsToMany(Game::class, 'game_developers', 'comp_id', 'game_id');
    }

    public function publishedGames() {
        return $this->belongsToMany(Game::class, 'game_publishers', 'comp_id', 'game_id');
    }
}
