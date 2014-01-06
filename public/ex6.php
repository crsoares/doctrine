<?php

require "bootstrap.php";

$tag = new Entity\Tag();
$tag->setLabel('Novo registro');
$em->persist($tag);
$em->flush();
