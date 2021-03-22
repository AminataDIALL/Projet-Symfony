<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicament
 *
 * @ORM\Table(name="medicament")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\MedicamentRepository")
 */
class Medicament
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
     /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Centre",inversedBy="dossierMedical")
     * @ORM\JoinColumn(nullable=true)
     */
    private $centre;
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", length=100, nullable=false)
     */
    private $prix;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", length=100, nullable=false)
     */
    private $quantite;
   
      /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", length=20, nullable=false)
     */
    private $date;
   

      /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePerime", type="datetime", length=20, nullable=false)
     */
    private $datePerime;
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
     * Set nom
     *
     * @param string $nom
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    

    /**
     * Set description
     *
     * @param string $description
     * @return Medicament
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
     * Set prix
     *
     * @param integer $prix
     * @return Medicament
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Medicament
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
     * Set datePerime
     *
     * @param \DateTime $datePerime
     * @return Medicament
     */
    public function setDatePerime($datePerime)
    {
        $this->datePerime = $datePerime;

        return $this;
    }

    /**
     * Get datePerime
     *
     * @return \DateTime 
     */
    public function getDatePerime()
    {
        return $this->datePerime;
    }

    /**
     * Set centre
     *
     * @param \CSRU\CSRUBundle\Entity\Centre $centre
     * @return Medicament
     */
    public function setCentre(\CSRU\CSRUBundle\Entity\Centre $centre = null)
    {
        $this->centre = $centre;

        return $this;
    }

    /**
     * Get centre
     *
     * @return \CSRU\CSRUBundle\Entity\Centre 
     */
    public function getCentre()
    {
        return $this->centre;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Medicament
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}
