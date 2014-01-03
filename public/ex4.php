<?php

require "bootstrap.php";

$user = $em->getRepository('Entity\User')->findOneById(1);
$userInfo = $user->getUserInfo();
//echo $user->getFirstName();die;
echo $userInfo->getTitle();
//var_dump($userInfo);die;
/*$user->removeUserInfo();
var_dump($user->getUserInfo());
var_dump($userInfo->getUser());
$em->flush();*/
