<?php

require "bootstrap.php";

$newUser = new Entity\User();
$newUser->setFirstName('Paulo')
        ->setLastName('da Silva');

$em->persist($newUser);
$em->flush();
