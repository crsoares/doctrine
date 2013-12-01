<?php

include_once "EntityManager.php";

$em = new EntityManager('localhost', 'app', 'root', '');
$user = $em->getUserRepository()->findOneById(2);
echo $user->assembleDisplayName();

$user->setFirstName('Moritz');
$em->saveUser($user);
