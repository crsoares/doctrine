<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity()
 * @Table(name="users")
 */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue 
     */
    private $id;
    
    /**
     * @Column(type="string", name="first_name", nullable=true) 
     */
    private $firstName;
    
    /**
     * @Column(type="string", name="last_name", nullable=true)
     */
    private $lastName;
    
    /**
     * @Column(type="string", nullable=true) 
     */
    private $gender;
    
    /**
     * @Column(type="string", name="name_prefix", nullable=true) 
     */
    private $namePrefix;
    
    /**
     * @OneToMany(targetEntity="Entity\Post", mappedBy="user")
     */
    private $posts;
    
    /**
     * @OneToOne(targetEntity="Entity\ContactData")
     * @JoinColumn(name="id", referencedColumnName="contactDataId")
     */
    private $contactData;
    
    
    private $userInfo;
    
    private $roles;
    
   
    private $categories;
    
    //private $postRepository;
    
    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;
    
    const GENDER_MALE_DISPLAY_VALUE = "Mr.";
    const GENDER_FEMALE_DISPLAY_VALUE= "Mrs.";
    
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }
    
    public function assembleDisplayName()
    {
        $displayName = "";
        
        if($this->gender == self::GENDER_MALE) {
            $displayName .= self::GENDER_MALE_DISPLAY_VALUE;     
        }elseif($this->gender == self::GENDER_FEMALE) {
            $displayName .= self::GENDER_FEMALE_DISPLAY_VALUE;
        }
        
        if($this->namePrefix) {
            $displayName .= " " . $this->namePrefix;
        }
        
        $displayName .=  " " . $this->firstName . " " . $this->lastName;
        
        return $displayName;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    
    public function getGender()
    {
        return $this->gender;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function setNamePrefix($namePrefix)
    {
        $this->namePrefix = $namePrefix;
    }
    
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }
    
    /*public function getPosts()
    {
        if(is_null($this->posts)) {
            $this->posts = $this->postRepository->findByUser($this);
        }
        return $this->posts;
    }*/
    
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }
    
    public function getPosts()
    {
        return $this->posts;
    }
    
    public function setContactData($contactData)
    {
        $this->contactData = $contactData;
        return $this;
    }
    
    public function getContactData()
    {
        return $this->contactData;
    }
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function getCategories()
    {
        return $this->categories;
    }
    
    /*public function setPostRepository($postRepository)
    {
        $this->postRepository = $postRepository;
    }*/
    
}