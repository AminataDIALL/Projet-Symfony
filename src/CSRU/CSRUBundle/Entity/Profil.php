<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\ProfilRepository")
 */
class Profil
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
     /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Image",
     * cascade={"persist", "remove"})
     */
    private $image;
    
     /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=100, nullable=false)
     */
    private $profession;
    
    /**
     * @var string
     *
     * @ORM\Column(name="centre", type="string", length=100, nullable=true)
     */
    private $centre;
    
     /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;
     /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", length=100, nullable=false)
     */
    private $telephone;
    
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="age", type="datetime", length=20, nullable=false)
     */
    private $age;
   

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
     * Set profession
     *
     * @param string $profession
     * @return Profil
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Profil
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Profil
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set age
     *
     * @param \DateTime $age
     * @return Profil
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set image
     *
     * @param \CSRU\CSRUBundle\Entity\Image $image
     * @return Profil
     */
    public function setImage(\CSRU\CSRUBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \CSRU\CSRUBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set centre
     *
     * @param string $centre
     * @return Profil
     */
    public function setCentre($centre)
    {
        $this->centre = $centre;

        return $this;
    }

    /**
     * Get centre
     *
     * @return string 
     */
    public function getCentre()
    {
        return $this->centre;
    }
}
