<?php

chdir(dirname(__DIR__));

include "AutoloaderClass.php";
AutoloaderClass::initialize();

if(file_exists('vendor/autoload.php')) {
    $loader = include 'vendor/autoload.php';
}



/*include "Entity/User.php";
include "Entity/Post.php";
include "Entity/ContactData.php";
include "Entity/UserInfo.php";*/



use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("Entity");
$isDevMode = true;

$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'app'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);
?>