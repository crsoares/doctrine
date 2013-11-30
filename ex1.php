<?php

include "EntityManager.php";

$entity = new EntityManager('localhost', 'app', 'root', '');

$user = $entity->getUserRepository()
              ->findOneById(1);

echo $user->assembleDisplayName() . "<br />";

$newUser = new Entity\User();
$newUser->setFirstName('Ute');
$newUser->setLastName('Musermann');
$newUser->setGender(1);

$entity->saveUser($newUser);

echo $newUser->assembleDisplayName();