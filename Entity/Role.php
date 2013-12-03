<?php

namespace Entity;

/**
 * @Entity()
 * @Table(name="role")
 */
class Role
{
    /**
     * @Id
     * @Column(name="integer")
     * @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $label;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setLable($label)
    {
        $this->label = $label;
    }
    
    public function getLabel()
    {
        return $this->label;
    }
}
