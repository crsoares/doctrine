<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Repository\Post")
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
     * @JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;
    
    /**
     * @ManyToMany(targetEntity="Entity\Tag", inversedBy="posts")
     */
    private $tags;
    
    /**
     * @ManyToOne(targetEntity="Entity\Category")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    
    /**
     * @Column(type="string")
     */
    private $title;
    
    /**
     * @Column(type="string")
     */
    private $content;
    
    /**
     * @Version
     * @Column(type="integer")
     */
    protected $version;
    
    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }
    
    public function getTags()
    {
        return $this->tags;
    }
    
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
}
