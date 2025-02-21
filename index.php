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
</body>
</html>
