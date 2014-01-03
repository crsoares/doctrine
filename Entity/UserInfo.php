<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="user_info")
 */
class UserInfo
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="datetime", nullable=true)
     */
    private $signUpDate;
    
    /**
     * @Column(type="datetime", nullable=true)
     */
    private $signOffDate = null;
    
    /**
     * @OneToOne(targetEntity="Entity\User", mappedBy="userInfo")
     * @JoinColumn(name="user_id", referencedColumnName="userInfo_id")
     */
    private $user;
    
    /**
     * @Column(type="string")
     */
    private $title;
    
    /*public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }*/
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setSignOffDate($signOffDate)
    {
        $this->signOffDate = $signOffDate;
        return $this;
    }
    
    public function getSignOffDate()
    {
        return $this->signOffDate;
    }
    
    public function setSingUpDate($signUpDate)
    {
        $this->signUpDate = $signUpDate;
        return $this;
    }
    
    public function getSignUpDate()
    {
        return $this->signUpDate;
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
    
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}
