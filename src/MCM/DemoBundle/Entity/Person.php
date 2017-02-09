<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="MCM\DemoBundle\Repository\PersonRepository")
 * @ORM\HasLifecycleCallbacks() 
 */
class Person
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="FootballTeam", inversedBy="fans")
     * @ORM\JoinColumn(name="football_team_id", referencedColumnName="id")
     */
    private $favFootballTeam;

    /** 
     * created Time/Date 
     * 
     * @var \DateTime 
     * 
     * @ORM\Column(name="created_at", type="datetime", nullable=false) 
     */  
    protected $createdAt;  
  
    /** 
     * updated Time/Date 
     * 
     * @var \DateTime 
     * 
     * @ORM\Column(name="updated_at", type="datetime", nullable=false) 
     */  
    protected $updatedAt; 
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set favFootballTeam
     *
     * @param string $favFootballTeam
     * @return Person
     */
    public function setFavFootballTeam(FootballTeam $favFootballTeam)
    {
        $this->favFootballTeam = $favFootballTeam;
    
        return $this;
    }

    /**
     * Get favFootballTeam
     *
     * @return string 
     */
    public function getFavFootballTeam()
    {
        return $this->favFootballTeam;
    }
    
    /** 
     * Set createdAt 
     * 
     * @ORM\PrePersist 
     */  
    public function setCreatedAt()  
    {  
        $this->createdAt = new \DateTime();  
        $this->updatedAt = new \DateTime();  
    }  
  
    /** 
     * Get createdAt 
     * 
     * @return \DateTime 
     */  
    public function getCreatedAt()  
    {  
        return $this->createdAt;  
    }  
  
    /** 
     * Set updatedAt 
     * 
     * @ORM\PreUpdate 
     */  
    public function setUpdatedAt()  
    {  
        $this->updatedAt = new \DateTime();  
    }  
  
    /** 
     * Get updatedAt 
     * 
     * @return \DateTime 
     */  
    public function getUpdatedAt()  
    {  
        return $this->updatedAt;  
    }      
}
