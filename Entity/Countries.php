<?php

namespace Kamran\ActivityBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity
 */
class Countries
{

     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function __toString(){
        return $this->name;
    }

}