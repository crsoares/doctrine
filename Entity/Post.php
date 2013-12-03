<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity()
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
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @Column(type="string") 
     */
    private $title;
    
    /**
     * @Column(type="string") 
     */
    private $content;
    
    /**
     * @ManyToMany(targetEntity="Entity\Tag", inversedBy="posts")
     */
    private $tags;
    
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}
