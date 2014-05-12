<?php

require "bootstrap.php";

$user = $em->getRepository('Entity\User')->findOneById(1);
echo $user->assembleDisplayName();
$user->setFirstName('Joao');
$em->persist($user);
$em->flush();