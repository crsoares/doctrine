<?php

require "bootstrap.php";

$posts = $em->getRepository('Entity\Post')->findAll();
var_dump($posts);