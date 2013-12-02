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
    
    
    public function getId()
    {
        return $this->id;
    }
}
