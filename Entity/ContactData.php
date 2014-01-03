<?php

namespace Entity;

/**
 * @Entity()
 * @Table(name="contact_data")
 */
class ContactData
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
    private $email;
    
    /**
     * @Column(type="string")
     */
    private $phone;
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
}
