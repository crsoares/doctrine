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
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @ManyToOne(targetEntity="Entity\User", inversedBy="posts")
     */
    private $user;
    
    /**
     * @ManyToMany(targetEntity="Entity\Tag", inversedBy="posts")
     */
    private $tags;
    
    /**
     * @ManyToOne(targentEntity="Entity\Category")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
}
