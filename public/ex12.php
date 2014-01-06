<?php

require "bootstrap.php";

$newPost = new Entity\Post();
$newPost->setTitle('novo teste remove com atributo cascade')
        ->setContent('novo teste conteudo');

$user = $em->getRepository('Entity\User')->findOneById(12);
$newPost->setUser($user);
$em->persist($newPost);
$em->flush();
