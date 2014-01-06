<?php

require "bootstrap.php";

$users = $em->getRepository('Entity\User')->listUsers();

foreach($users as $user) {
    echo $user->getFirstName() . '<br />';
}
