<?php
use Illuminate\Database\Capsule\Manager as Database;

$database = new Database;
$database->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'tienda',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);

date_default_timezone_set('America/Santiago');

$database->setAsGlobal();
$database->bootEloquent();