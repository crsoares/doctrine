<?php

require "bootstrap.php";

//$tag = $em->getRepository('Entity\Tag')->findOneBy(array('label' => 'Novo registro'));
$tag = $em->getRepository('Entity\Tag')->findOneByLabel('Novo Registro');
//var_dump($tag);
echo $tag->getLabel();
