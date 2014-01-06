<?php

require "bootstrap.php";

$user = $em->getRepository('Entity\User')->find(12);
$em->remove($user);
$em->flush();
