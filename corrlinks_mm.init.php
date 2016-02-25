<?php
error_reporting(E_ALL);
include "vendor/autoload.php";
include "corrlinks_mm.functions.php";

// Database information
$settings = array(
    'driver' => 'mysql',
    'host' => '10.1.1.11',
    'database' => 'pacteltest',
    'username' => 'roman',
    'password' => 'treadmill',
    'port' => '3306',
   	'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
);


/*
// Bootstrap Eloquent ORM
$container = new Illuminate\Container\Container;
$connFactory = new \Illuminate\Database\Connectors\ConnectionFactory($container);
$conn = $connFactory->make($settings);
$resolver = new \Illuminate\Database\ConnectionResolver();
$resolver->addConnection('default', $conn);
$resolver->setDefaultConnection('default');
\Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
*/


$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection($settings);
$capsule->setAsGlobal();
$capsule->bootEloquent();

class DB extends Illuminate\Database\Capsule\Manager {
	
}