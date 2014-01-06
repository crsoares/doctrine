<?php

require "bootstrap.php";

$users = $em->getRepository('Entity\User')->listUser();

foreach($users as $user) {
    echo $user->getFirstName() . '<br />';
}

//echo $user->getFirstName();

