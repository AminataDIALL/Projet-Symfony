<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospitalisation
 *
 * @ORM\Table(name="hospitalisation")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\HospitalisationRepository")
 */
class Hospitalisation
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
     /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Patient",mappedBy="hospitalisation",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $patient;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="hospitalisation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $DossierMedical;
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="hospitalisation")
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
     * @ORM\Column(name="hopital", type="string", length=100, nullable=true)
     */
    private $hopital;
    
     /**
     * @var string
     *
     * @ORM\Column(name="fiche_de_sortie", type="string", length=100, nullable=false)
     */
    private $motif;
    
     /**
     * @var string
     *
     * @ORM\Column(name="lit", type="string", length=100, nullable=false)
     */
    private $lit;
    
     /**
     * @var string
     *
     * @ORM\Column(name="salle", type="string", length=100, nullable=false)
     */
    private $salle;
    
     /**
     * @var string
     *
     * @ORM\Column(name="pavillon", type="string", length=100, nullable=false)
     */
    private $pavillon;
    
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
     * @return Hospitalisation
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
     * Constructor
     */
    public function __construct()
    {
        $this->patient = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add patient
     *
     * @param \CSRU\CSRUBundle\Entity\Patient $patient
     * @return Hospitalisation
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
     * Set DossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Hospitalisation
     */
    public function setDossierMedical(\CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical = null)
    {
        $this->DossierMedical = $dossierMedical;

        return $this;
    }

    /**
     * Get DossierMedical
     *
     * @return \CSRU\CSRUBundle\Entity\DossierMedical 
     */
    public function getDossierMedical()
    {
        return $this->DossierMedical;
    }

    /**
     * Set motif
     *
     * @param string $motif
     * @return Hospitalisation
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set lit
     *
     * @param string $lit
     * @return Hospitalisation
     */
    public function setLit($lit)
    {
        $this->lit = $lit;

        return $this;
    }

    /**
     * Get lit
     *
     * @return string 
     */
    public function getLit()
    {
        return $this->lit;
    }

    /**
     * Set salle
     *
     * @param string $salle
     * @return Hospitalisation
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return string 
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set pavillon
     *
     * @param string $pavillon
     * @return Hospitalisation
     */
    public function setPavillon($pavillon)
    {
        $this->pavillon = $pavillon;

        return $this;
    }

    /**
     * Get pavillon
     *
     * @return string 
     */
    public function getPavillon()
    {
        return $this->pavillon;
    }

    /**
     * Set utilisateur
     *
     * @param \CSRU\CSRUBundle\Entity\Utilisateur $utilisateur
     * @return Hospitalisation
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

    /**
     * Set hopital
     *
     * @param string $hopital
     * @return Hospitalisation
     */
    public function setHopital($hopital)
    {
        $this->hopital = $hopital;

        return $this;
    }

    /**
     * Get hopital
     *
     * @return string 
     */
    public function getHopital()
    {
        return $this->hopital;
    }
}
