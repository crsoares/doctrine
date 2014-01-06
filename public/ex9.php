<?php

require "bootstrap.php";

$post = $em->getRepository('Entity\Post')->find(3);
$em->remove($post);
$em->flush();
