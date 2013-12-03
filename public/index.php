<?php

if(file_exists('../vendor/autoload.php')) {
    $loader = include '../vendor/autoload.php';
}

include "../Entity/User.php";
include "../Entity/Post.php";
include "../Entity/ContactData.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/../Entity/");
$isDevMode = true;

$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'app'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);
$user = $em->getRepository('Entity\User')->findOneById(1);
//var_dump($user->getContactData());die;
echo $user->getContactData()->getEmail();die;
?>
<h1><?php echo $user->assembleDisplayName(); ?></h1>
<ul>
    <?php foreach($user->getPosts() as $post): ?>
            <li><?php echo $post->getTitle(); ?></li>
    <?php endforeach; ?>
</ul>
