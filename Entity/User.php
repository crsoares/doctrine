<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="Repository\User")
 * @HasLifecycleCallbacks
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
     * @OrderBy({"id" = "ASC"})
     */
    private $posts;
    
    /**
     * @OneToOne(targetEntity="Entity\ContactData")
     */
    private $contactData;
    
    /**
     * @OneToOne(targetEntity="Entity\UserInfo", inversedBy="user")
     */
    private $userInfo;
    
    /**
     * @ManyToMany(targetEntity="Entity\Role")
     * @JoinTable(name="users_roles", 
     *        joinColumns={@JoinColumn(name="user", referencedColumnName="id")},
     *        inverseJoinColumns={@JoinColumn(name="role", referencedColumnName="id")})
     */
    private $roles;
    
    /**
     * @ManyToMany(targetEntity="Entity\Category")
     * @JoinTable(name="users_categories",
     *    joinColumns={@JoinColumn(name="user", referencedColumnName="id")},
     *    inverseJoinColumns={@JoinColumn(name="category",
     *              referencedColumnName="id", unique=true)})
     */
    private $categories;
    
    /**
     * @OneToOne(targetEntity="Entity\User")
     * @JoinColumn(name="partner", referencedColumnName="id")
     */
    private $lifePartner;
    
    /**
     * @ManyToMany(targetEntity="Entity\User")
     * @JoinTable(name="friends", 
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="friend_user_id", referencedColumnName="id")})
     */
    private $myFriends;
    
    /**
     * @Column(type="string")
     */
    private $password;
    
    //private $postRepository;
    
    const GENERATED_PASSWORD_LENGTH = 6;
    
    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;
    
    const GENDER_MALE_DISPLAY_VALUE = "Mr.";
    const GENDER_FEMALE_DISPLAY_VALUE= "Mrs.";
    
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
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
        return $this;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }
    
    public function getGender()
    {
        return $this->gender;
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
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function setNamePrefix($namePrefix)
    {
        $this->namePrefix = $namePrefix;
        return $this;
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
        return $this;
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
        return $this;
    }
    
    public function getCategories()
    {
        return $this->categories;
    }
    
    public function setUserInfo($userInfo)
    {
        $this->userInfo = $userInfo;
        return $this;
    }
    
    public function getUserInfo()
    {
        return $this->userInfo;
    }
    
    public function removeUserInfo()
    {
        $this->userInfo->setUser(null);
        $this->userInfo = null;
    }
    
    public function setLifePartner($lifePartner)
    {
        $this->lifePartner = $lifePartner;
        return $this;
    }
    
    public function getLifePartner()
    {
        return $this->lifePartner;
    }
    
    public function setMyFriends($myFriends)
    {
        $this->myFriends = $myFriends;
        return $this;
    }
    
    public function getMyFriends()
    {
        return $this->myFriends;
    }
    
    /**
     * @PrePersist
     */
    public function generatePassword()
    {
        for($i = 1; $i <= self::GENERATED_PASSWORD_LENGTH; $i++) {
            $this->password .= chr(rand(65, 90));
        }
    }
    
    /*public function setPostRepository($postRepository)
    {
        $this->postRepository = $postRepository;
    }*/
    
}