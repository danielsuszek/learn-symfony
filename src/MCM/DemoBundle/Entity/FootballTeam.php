<?php

namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="football_team")
 * @ORM\Entity
 */
class FootballTeam
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
     * @ORM\OneToMany(targetEntity="Person", mappedBy="favFootballTeam")
     */    
    protected $fans;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="stadium_name", type="string", length=100)
     */
    private $stadiumName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() 
    {
        $this->fans = new ArrayCollection();
    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return FootballTeam
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
     * Set stadiumName
     *
     * @param string $stadiumName
     * @return FootballTeam
     */
    public function setStadiumName($stadiumName)
    {
        $this->stadiumName = $stadiumName;
    
        return $this;
    }

    /**
     * Get stadiumName
     *
     * @return string 
     */
    public function getStadiumName()
    {
        return $this->stadiumName;
    }
    /*
     * 
     * @return ArrayCollection()
     */
    public function getFans() 
    {
        return $this->fans;
    }
}
