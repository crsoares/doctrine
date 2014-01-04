<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="posts")
 */
class Post
{
    /**
     * @ManyToOne(targetEntity="Entity\User", inversedBy="posts")
     */
    private $user;
    
    /**
     * @ManyToMany(targetEntity="Entity\Tag", inversedBy="posts")
     */
    private $tags;
    
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
}
