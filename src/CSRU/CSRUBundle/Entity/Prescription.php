<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescription
 *
 * @ORM\Table(name="prescription")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\PrescriptionRepository")
 */
class Prescription
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="prescription")
     * @ORM\JoinColumn(nullable=true)
     */
    private $DossierMedical;
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="prescription")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;
    
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\MediPrescrit",inversedBy="prescription",
     * cascade={ "persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $MediPrescription;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", length=20, nullable=false)
     */
    private $date;
    
     /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=true)
     */
    private $contenu;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomMedicament", type="string", length=100, nullable=true)
     */
    private $nomMedicament;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nbreMedicament", type="string", length=100, nullable=true)
     */
    private $nbreMedicament;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="quantiteMedicament", type="string", length=100, nullable=true)
     */
    private $quantiteMedicament;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typeExamen", type="string", length=100, nullable=true)
     */
    private $typeExamen;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;
   

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
     * @return Prescription
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
     * Set contenu
     *
     * @param string $contenu
     * @return Prescription
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Prescription
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
     * @return Prescription
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
     * @return Prescription
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
     * Set utilisateur
     *
     * @param \CSRU\CSRUBundle\Entity\Utilisateur $utilisateur
     * @return Prescription
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
     * Set nomMedicament
     *
     * @param string $nomMedicament
     * @return Prescription
     */
    public function setNomMedicament($nomMedicament)
    {
        $this->nomMedicament = $nomMedicament;

        return $this;
    }

    /**
     * Get nomMedicament
     *
     * @return string 
     */
    public function getNomMedicament()
    {
        return $this->nomMedicament;
    }

    /**
     * Set nbreMedicament
     *
     * @param string $nbreMedicament
     * @return Prescription
     */
    public function setNbreMedicament($nbreMedicament)
    {
        $this->nbreMedicament = $nbreMedicament;

        return $this;
    }

    /**
     * Get nbreMedicament
     *
     * @return string 
     */
    public function getNbreMedicament()
    {
        return $this->nbreMedicament;
    }

    /**
     * Set typeExamen
     *
     * @param string $typeExamen
     * @return Prescription
     */
    public function setTypeExamen($typeExamen)
    {
        $this->typeExamen = $typeExamen;

        return $this;
    }

    /**
     * Get typeExamen
     *
     * @return string 
     */
    public function getTypeExamen()
    {
        return $this->typeExamen;
    }

    /**
     * Set quantiteMedicament
     *
     * @param string $quantiteMedicament
     * @return Prescription
     */
    public function setQuantiteMedicament($quantiteMedicament)
    {
        $this->quantiteMedicament = $quantiteMedicament;

        return $this;
    }

    /**
     * Get quantiteMedicament
     *
     * @return string 
     */
    public function getQuantiteMedicament()
    {
        return $this->quantiteMedicament;
    }

    /**
     * Set MediPrescription
     *
     * @param \CSRU\CSRUBundle\Entity\MediPrescrit $mediPrescription
     * @return Prescription
     */
    public function setMediPrescription(\CSRU\CSRUBundle\Entity\MediPrescrit $mediPrescription = null)
    {
        $this->MediPrescription = $mediPrescription;

        return $this;
    }

    /**
     * Get MediPrescription
     *
     * @return \CSRU\CSRUBundle\Entity\MediPrescrit 
     */
    public function getMediPrescription()
    {
        return $this->MediPrescription;
    }
}
