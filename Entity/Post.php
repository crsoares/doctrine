<?php

namespace Entity;

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
}
