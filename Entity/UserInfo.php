<?php

namespace Entity;

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
    private $signOffDate;
    
    /**
     * @OneToOne(targetEntity="Entity\User", meppedBy="userInfo")
     */
    private $user;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setSignUpDate($signUpDate)
    {
        $this->signUpDate = $signUpDate;
    }
    
    public function getSignUpDate()
    {
        return $this->signUpDate;
    }
    
    public function setSignOffDate($signOffDate)
    {
        $this->signOffDate = $signOffDate;
    }
    
    public function getSignOffDate()
    {
        return $this->signOffDate;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    public function getUser()
    {
        return $this->user;
    }
}
