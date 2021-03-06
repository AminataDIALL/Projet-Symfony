<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="antecedant")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\AntecedantRepository")
 */
class Antecedant
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Patient",mappedBy="consultation",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $patient;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="antecedant")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dossierMedical;
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="antecedant")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", length=20, nullable=false)
     */
    private $date;
    
     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;
    
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;
    
    

  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patient = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set date
     *
     * @param \DateTime $date
     * @return Antecedant
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Antecedant
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Antecedant
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add patient
     *
     * @param \CSRU\CSRUBundle\Entity\Patient $patient
     * @return Antecedant
     */
    public function addPatient(\CSRU\CSRUBundle\Entity\Patient $patient)
    {
        $this->patient[] = $patient;

        return $this;
    }

    /**
     * Remove patient
     *
     * @param \CSRU\CSRUBundle\Entity\Patient $patient
     */
    public function removePatient(\CSRU\CSRUBundle\Entity\Patient $patient)
    {
        $this->patient->removeElement($patient);
    }

    /**
     * Get patient
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set dossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Antecedant
     */
    public function setDossierMedical(\CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical = null)
    {
        $this->dossierMedical = $dossierMedical;

        return $this;
    }

    /**
     * Get dossierMedical
     *
     * @return \CSRU\CSRUBundle\Entity\DossierMedical 
     */
    public function getDossierMedical()
    {
        return $this->dossierMedical;
    }

    /**
     * Set utilisateur
     *
     * @param \CSRU\CSRUBundle\Entity\Utilisateur $utilisateur
     * @return Antecedant
     */
    public function setUtilisateur(\CSRU\CSRUBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \CSRU\CSRUBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
