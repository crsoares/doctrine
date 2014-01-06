<?php

require_once "bootstrap.php";
//require_once "Entity/Tag.php";

$newPost = new Entity\Post();
//var_dump($newPost);die;
$newPost->setTitle('Um novo TESTE post!');
$newPost->setContent('Este é o corpo da nova mensagem.');
$em->persist($newPost);
$em->flush();

