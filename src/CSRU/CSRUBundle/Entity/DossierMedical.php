<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DossierMedical
 *
 * @ORM\Table(name="dossiermedical")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\DossierMedicalRepository")
 */
class DossierMedical
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Etudiant",
     * cascade={"persist", "remove"})
     */
    private $etudiant;
    
     /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Image",
     * cascade={"persist", "remove"})
     */
    private $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="dossierMedical")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Centre",inversedBy="dossierMedical")
     * @ORM\JoinColumn(nullable=true)
     */
    private $centre;
    
    /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Prescription",mappedBy="dossierMedical",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $prescription;
    
    /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Hospitalisation",mappedBy="dossierMedical",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $hospitalisation;
    
     /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Consultation",mappedBy="dossierMedical",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $consultation;
    
     /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Antecedant",mappedBy="dossierMedical",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $antecedant;
    
     /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Examen",mappedBy="dossierMedical",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $examen;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", length=20, nullable=false)
     */
    private $date;
    

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
     * Set etudiant
     *
     * @param \CSRU\CSRUBundle\Entity\Etudiant $etudiant
     * @return DossierMedical
     */
    public function setEtudiant(\CSRU\CSRUBundle\Entity\Etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \CSRU\CSRUBundle\Entity\Etudiant 
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return DossierMedical
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
        $this->prescription = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prescription
     *
     * @param \CSRU\CSRUBundle\Entity\Prescription $prescription
     * @return DossierMedical
     */
    public function addPrescription(\CSRU\CSRUBundle\Entity\Prescription $prescription)
    {
        $this->prescription[] = $prescription;

        return $this;
    }

    /**
     * Remove prescription
     *
     * @param \CSRU\CSRUBundle\Entity\Prescription $prescription
     */
    public function removePrescription(\CSRU\CSRUBundle\Entity\Prescription $prescription)
    {
        $this->prescription->removeElement($prescription);
    }

    /**
     * Get prescription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrescription()
    {
        return $this->prescription;
    }

    /**
     * Add hospitalisation
     *
     * @param \CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation
     * @return DossierMedical
     */
    public function addHospitalisation(\CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation)
    {
        $this->hospitalisation[] = $hospitalisation;

        return $this;
    }

    /**
     * Remove hospitalisation
     *
     * @param \CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation
     */
    public function removeHospitalisation(\CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation)
    {
        $this->hospitalisation->removeElement($hospitalisation);
    }

    /**
     * Get hospitalisation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHospitalisation()
    {
        return $this->hospitalisation;
    }

    /**
     * Add consultation
     *
     * @param \CSRU\CSRUBundle\Entity\Consultation $consultation
     * @return DossierMedical
     */
    public function addConsultation(\CSRU\CSRUBundle\Entity\Consultation $consultation)
    {
        $this->consultation[] = $consultation;

        return $this;
    }

    /**
     * Remove consultation
     *
     * @param \CSRU\CSRUBundle\Entity\Consultation $consultation
     */
    public function removeConsultation(\CSRU\CSRUBundle\Entity\Consultation $consultation)
    {
        $this->consultation->removeElement($consultation);
    }

    /**
     * Get consultation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * Add antecedant
     *
     * @param \CSRU\CSRUBundle\Entity\Antecedant $antecedant
     * @return DossierMedical
     */
    public function addAntecedant(\CSRU\CSRUBundle\Entity\Antecedant $antecedant)
    {
        $this->antecedant[] = $antecedant;

        return $this;
    }

    /**
     * Remove antecedant
     *
     * @param \CSRU\CSRUBundle\Entity\Antecedant $antecedant
     */
    public function removeAntecedant(\CSRU\CSRUBundle\Entity\Antecedant $antecedant)
    {
        $this->antecedant->removeElement($antecedant);
    }

    /**
     * Get antecedant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAntecedant()
    {
        return $this->antecedant;
    }

    /**
     * Set utilisateur
     *
     * @param \CSRU\CSRUBundle\Entity\Utilisateur $utilisateur
     * @return DossierMedical
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
     * Set image
     *
     * @param \CSRU\CSRUBundle\Entity\Image $image
     * @return DossierMedical
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
     * @param \CSRU\CSRUBundle\Entity\Centre $centre
     * @return DossierMedical
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
     * Add examen
     *
     * @param \CSRU\CSRUBundle\Entity\Examen $examen
     * @return DossierMedical
     */
    public function addExaman(\CSRU\CSRUBundle\Entity\Examen $examen)
    {
        $this->examen[] = $examen;

        return $this;
    }

    /**
     * Remove examen
     *
     * @param \CSRU\CSRUBundle\Entity\Examen $examen
     */
    public function removeExaman(\CSRU\CSRUBundle\Entity\Examen $examen)
    {
        $this->examen->removeElement($examen);
    }

    /**
     * Get examen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamen()
    {
        return $this->examen;
    }
}
