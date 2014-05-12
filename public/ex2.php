<?php

require "bootstrap.php";

$user = $em->getRepository('Entity\User')->findOneById(1);

echo $user->assembleDisplayName() . '<br />';
foreach($user->getPosts() as $posts) {
	echo $posts->getTitle();
}
