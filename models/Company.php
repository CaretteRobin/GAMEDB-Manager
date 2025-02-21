<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'companies';
    protected $fillable = ['name', 'alias', 'abbreviation', 'description_short', 'description_long', 'address', 'creation_date', 'phone', 'website'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game_developers', 'comp_id', 'game_id');
    }
}
