<?php

require "bootstrap.php";

$post = $em->getRepository('Entity\Post')->find(4);
$post->setTitle('teste 2');
$em->flush();
$em->clear();

$post = $em->getRepository('Entity\Post')->find(4);
$post->setTitle('teste 1');
$em->flush();
