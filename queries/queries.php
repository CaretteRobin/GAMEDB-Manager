<?php
use Models\Game;
use Models\Company;
use Models\Platform;
use Models\Character;
use Models\Rating;
use Models\Genre;

// a. Lister les jeux dont le nom contient « Marine »
function getGamesWithNameContainingMarine() {
    return Game::where('name', 'like', '%Marine%')->get();
}

// b. Lister les compagnies installées en France
function getCompaniesInFrance() {
    return Company::where('location_country', 'France')->get();
}

// c. Lister les plateformes dont la base installée est >= 10 000 000
function getPlatformsWithInstallBase() {
    return Platform::where('install_base', '>=', 10000000)->get();
}

// d. Lister 200 jeux à partir du 21173 ème
function getGamesFrom21173() {
    return Game::skip(21172)->take(200)->get();
}

// e. Lister les jeux, afficher leur nom et deck, en paginant (taille des pages à 300)
function getGamesWithPagination() {
    return Game::select('name', 'deck')->paginate(300);
}

// f. Afficher (name , deck) les personnages du jeu 12342
function getCharactersOfGame12342() {
    return Character::whereHas('games', function($query) {
        $query->where('id', 12342);
    })->select('name', 'deck')->get();
}

// g. Afficher les personnages des jeux dont le nom (du jeu) débute par « Mario »
function getCharactersOfGamesStartingWithMario() {
    return Character::whereHas('games', function($query) {
        $query->where('name', 'like', 'Mario%');
    })->get();
}

// h. Afficher les jeux développés par une compagnie dont le nom contient « Sony »
function getGamesDevelopedBySony() {
    return Game::whereHas('developers', function($query) {
        $query->where('name', 'like', '%Sony%');
    })->get();
}

// i. Afficher le rating initial (indiquer le rating board) des jeux dont le nom contient « Mario »
function getInitialRatingOfGamesWithNameMario() {
    return Game::where('name', 'like', 'Mario%')
        ->with(['ratings' => function($query) {
            $query->select('name', 'rating_board_id');
        }])->get();
}

// j. Afficher les jeux dont le nom débute par « Mario » et ayant plus de 3 personnages
function getGamesWithNameMarioAndMoreThan3Characters() {
    return Game::where('name', 'like', 'Mario%')
        ->whereHas('characters', function($query) {
            $query->select('game2character.game_id')
                  ->groupBy('game2character.game_id')
                  ->havingRaw('COUNT(game2character.character_id) > 3');
        })->get();
}

// k. Afficher les jeux dont le nom débute par « Mario » et dont le rating initial contient "3+"
function getGamesWithNameMarioAndRating3Plus() {
    return Game::where('name', 'like', 'Mario%')
        ->whereHas('ratings', function($query) {
            $query->where('name', 'like', '%3+%');
        })->get();
}

// l. Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc. » et dont le rating initial contient "3+"
function getGamesWithNameMarioPublishedByIncAndRating3Plus() {
    return Game::where('name', 'like', 'Mario%')
        ->whereHas('publishers', function($query) {
            $query->where('name', 'like', '%Inc.%');
        })
        ->whereHas('ratings', function($query) {
            $query->where('name', 'like', '%3+%');
        })->get();
}

// m. Afficher les jeux dont le nom débute par « Mario », publiés par une compagnie dont le nom contient « Inc », dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé « CERO »
function getGamesWithNameMarioPublishedByIncRating3PlusAndCERO() {
    return Game::where('name', 'like', 'Mario%')
        ->whereHas('publishers', function($query) {
            $query->where('name', 'like', '%Inc.%');
        })
        ->whereHas('ratings', function($query) {
            $query->where('name', 'like', '%3+%')
                ->where('rating_board_id', function($query) {
                    $query->select('id')->from('rating_board')->where('name', 'CERO');
                });
        })->get();
}

// n. Ajouter un nouveau genre de jeu, et l'associer aux jeux 12, 56, 345
function addNewGenreAndAssociateWithGames($genreName, $gameIds) {
    $genre = Genre::create(['name' => $genreName]);
    $genre->games()->attach($gameIds);
    return $genre;
}
