<?php

require "bootstrap.php";

$em->transactional(function($em) {
       /**
        * $em EntityManager
        */
       $oldUser = $em->getRepository('Entity\User')->find(4);
       $newUser = new Entity\User();
       $newUser->setFirstName($oldUser->getFirstName())
               ->setLastName($oldUser->getLastName());

       $em->persist($newUser);
       $em->remove($oldUser);
       //$em->flush();
});


