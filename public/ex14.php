<?php

require "bootstrap.php";

$post = $em->getRepository('Entity\Post')->find(16);
$em->remove($post);
$em->flush();
