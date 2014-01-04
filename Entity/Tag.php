<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="tag")
 */
class Tag
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $label;
    
    /**
     * @ManyToMany(targetEntity="Entity\Post", mappedBy="tags")
     */
    private $posts;
    
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }
    public function getLabel()
    {
        return $this->label;
    }
    
    public function setPosts($posts)
    {
        $this->posts = $posts;
        return $this;
    }
    
    public function getPosts()
    {
        return $this->posts;
    }
}
