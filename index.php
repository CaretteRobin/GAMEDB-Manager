<?php

require 'bootstrap.php';
require 'queries/queries.php';

$gamesWithMarine = getGamesWithNameContainingMarine();
$companiesInFrance = getCompaniesInFrance();
$platformsWithInstallBase = getPlatformsWithInstallBase();
$gamesFrom21173 = getGamesFrom21173();
$gamesWithPagination = getGamesWithPagination();
$charactersOfGame12342 = getCharactersOfGame12342();
$charactersOfGamesStartingWithMario = getCharactersOfGamesStartingWithMario();
$gamesDevelopedBySony = getGamesDevelopedBySony();
$initialRatingOfGamesWithNameMario = getInitialRatingOfGamesWithNameMario();
$gamesWithNameMarioAndMoreThan3Characters = getGamesWithNameMarioAndMoreThan3Characters();
$gamesWithNameMarioAndRating3Plus = getGamesWithNameMarioAndRating3Plus();
$gamesWithNameMarioPublishedByIncAndRating3Plus = getGamesWithNameMarioPublishedByIncAndRating3Plus();
$gamesWithNameMarioPublishedByIncRating3PlusAndCERO = getGamesWithNameMarioPublishedByIncRating3PlusAndCERO();

// Ajouter un nouveau genre de jeu et l'associer aux jeux 12, 56, 345
$newGenre = addNewGenreAndAssociateWithGames('Nouveau Genre', [12, 56, 345]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des jeux</title>
</head>
<body>
    <h1>Liste des jeux dont le nom contient "Marine"</h1>
    <ul>
        <?php foreach ($gamesWithMarine as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Liste des compagnies installées en France</h1>
    <ul>
        <?php foreach ($companiesInFrance as $company): ?>
            <li><?php echo htmlspecialchars($company->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Liste des plateformes dont la base installée est >= 10 000 000</h1>
    <ul>
        <?php foreach ($platformsWithInstallBase as $platform): ?>
            <li><?php echo htmlspecialchars($platform->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Liste de 200 jeux à partir du 21173 ème</h1>
    <ul>
        <?php foreach ($gamesFrom21173 as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Liste des jeux (pagination de 300)</h1>
    <ul>
        <?php foreach ($gamesWithPagination as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($game->deck, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Personnages du jeu 12342</h1>
    <ul>
        <?php foreach ($charactersOfGame12342 as $character): ?>
            <li><?php echo htmlspecialchars($character->name, ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($character->deck, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Personnages des jeux dont le nom débute par "Mario"</h1>
    <ul>
        <?php foreach ($charactersOfGamesStartingWithMario as $character): ?>
            <li><?php echo htmlspecialchars($character->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Jeux développés par une compagnie dont le nom contient "Sony"</h1>
    <ul>
        <?php foreach ($gamesDevelopedBySony as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Rating initial des jeux dont le nom contient "Mario"</h1>
    <ul>
        <?php foreach ($initialRatingOfGamesWithNameMario as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($game->ratings->first()->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Jeux dont le nom débute par "Mario" et ayant plus de 3 personnages</h1>
    <ul>
        <?php foreach ($gamesWithNameMarioAndMoreThan3Characters as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Jeux dont le nom débute par "Mario" et dont le rating initial contient "3+"</h1>
    <ul>
        <?php foreach ($gamesWithNameMarioAndRating3Plus as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Jeux dont le nom débute par "Mario", publiés par une compagnie dont le nom contient "Inc." et dont le rating initial contient "3+"</h1>
    <ul>
        <?php foreach ($gamesWithNameMarioPublishedByIncAndRating3Plus as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Jeux dont le nom débute par "Mario", publiés par une compagnie dont le nom contient "Inc", dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé "CERO"</h1>
    <ul>
        <?php foreach ($gamesWithNameMarioPublishedByIncRating3PlusAndCERO as $game): ?>
            <li><?php echo htmlspecialchars($game->name, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h1>Nouveau genre ajouté et associé aux jeux 12, 56, 345</h1>
    <p>Genre : <?php echo htmlspecialchars($newGenre->name, ENT_QUOTES, 'UTF-8'); ?></p>
</body>
</html>