<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;

class Post extends EntityRepository
{
    public function findAllPostsWithTag($tag)
    {
        //DQL declara��o vai aqui
    }
}
