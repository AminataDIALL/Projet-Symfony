<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\ConsultationRepository")
 */
class Consultation
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
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="consultation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dossierMedical;
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="consultation")
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_rdv", type="datetime", length=20, nullable=false)
     */
    private $date_rdv;
    
    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=100, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="poids", type="string", length=100, nullable=true)
     */
    private $poids;
    
     /**
     * @var string
     *
     * @ORM\Column(name="tension", type="string", length=100, nullable=true)
     */
    private $tension;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="temperature", type="string", length=100, nullable=true)
     */
    private $temperature;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=100, nullable=true)
     */
    private $motif;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="resultat", type="string", length=100, nullable=true)
     */
    private $resultat;
    
   
     /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;
    
    

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
     * @return Consultation
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
     * Set date_rdv
     *
     * @param \DateTime $dateRdv
     * @return Consultation
     */
    public function setDateRdv($dateRdv)
    {
        $this->date_rdv = $dateRdv;

        return $this;
    }

    /**
     * Get date_rdv
     *
     * @return \DateTime 
     */
    public function getDateRdv()
    {
        return $this->date_rdv;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Consultation
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
     * @return Consultation
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
     * @return Consultation
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
     * @return Consultation
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
     * Set taille
     *
     * @param string $taille
     * @return Consultation
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param string $poids
     * @return Consultation
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return string 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set tension
     *
     * @param string $tension
     * @return Consultation
     */
    public function setTension($tension)
    {
        $this->tension = $tension;

        return $this;
    }

    /**
     * Get tension
     *
     * @return string 
     */
    public function getTension()
    {
        return $this->tension;
    }

    /**
     * Set temperature
     *
     * @param string $temperature
     * @return Consultation
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return string 
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set motif
     *
     * @param string $motif
     * @return Consultation
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
     * Set resultat
     *
     * @param string $resultat
     * @return Consultation
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return string 
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}
