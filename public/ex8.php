<?php

require "bootstrap.php";

$posts = $em->getRepository("Entity\Post")->find(4);
$posts->setTitle('Post alterado com sucesso');
$em->flush();
