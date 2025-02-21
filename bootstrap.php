<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Pagination\Paginator;

// Charger la configuration depuis conf.ini
$config = parse_ini_file(__DIR__ . '/conf.ini', true);

// Vérifier si la config a été chargée
if (!$config) {
    die("❌ Erreur : Impossible de charger le fichier conf.ini\n");
}

// Initialiser Eloquent (base de données)
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $config['database']['host'],
    'port'      => $config['database']['port'],
    'database'  => $config['database']['database'],
    'username'  => $config['database']['username'],
    'password'  => $config['database']['password'],
    'charset'   => $config['database']['charset'],
    'collation' => $config['database']['collation'],
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Configurer la pagination
Paginator::useBootstrap();

echo "✅ Eloquent est bien connecté à la base de données !\n";
