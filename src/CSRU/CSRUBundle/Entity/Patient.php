<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\PatientRepository")
 */
class Patient {

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
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Hospitalisation",inversedBy="patient")
     * @ORM\JoinColumn(nullable=true)
     */
    private $hospitalisation;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Consultation",inversedBy="patient")
     * @ORM\JoinColumn(nullable=true)
     */
    private $consultation;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Reservation",inversedBy="patient")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reservation;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="patient")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dossierMedical;
    
     /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Carte_AMV",
     * cascade={"persist", "remove"})
     */
    private $carte_AMV;
    
       /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=20, nullable=false)
     */
    private $age;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=20, nullable=false)
     */
    private $sexe;
    
    /**
     * @var string
     *
     * @ORM\Column(name="statutMatri", type="string", length=20, nullable=false)
     */
    private $statutMatri;
    
    /**
     * @var string
     *
     * @ORM\Column(name="poids", type="string", length=20, nullable=true)
     */
    private $poids;
    
    /**
     * @var string
     *
     * @ORM\Column(name="temperature", type="string", length=20, nullable=true)
     */
    private $temperature;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", length=20, nullable=false)
     */
    private $telephone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=20, nullable=false)
     */
    private $matricule;


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
     * @return Patient
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
     * Set prenom
     *
     * @param string $prenom
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set age
     *
     * @param string $age
     * @return Patient
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Patient
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set statutMatri
     *
     * @param string $statutMatri
     * @return Patient
     */
    public function setStatutMatri($statutMatri)
    {
        $this->statutMatri = $statutMatri;

        return $this;
    }

    /**
     * Get statutMatri
     *
     * @return string 
     */
    public function getStatutMatri()
    {
        return $this->statutMatri;
    }

    /**
     * Set poids
     *
     * @param string $poids
     * @return Patient
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
     * Set temperature
     *
     * @param string $temperature
     * @return Patient
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
     * Set telephone
     *
     * @param integer $telephone
     * @return Patient
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
     * Set adresse
     *
     * @param string $adresse
     * @return Patient
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
     * Set matricule
     *
     * @param string $matricule
     * @return Patient
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set hospitalisation
     *
     * @param \CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation
     * @return Patient
     */
    public function setHospitalisation(\CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation = null)
    {
        $this->hospitalisation = $hospitalisation;

        return $this;
    }

    /**
     * Get hospitalisation
     *
     * @return \CSRU\CSRUBundle\Entity\Hospitalisation 
     */
    public function getHospitalisation()
    {
        return $this->hospitalisation;
    }

    /**
     * Set etudiant
     *
     * @param \CSRU\CSRUBundle\Entity\Etudiant $etudiant
     * @return Patient
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
     * Set consultation
     *
     * @param \CSRU\CSRUBundle\Entity\Consultation $consultation
     * @return Patient
     */
    public function setConsultation(\CSRU\CSRUBundle\Entity\Consultation $consultation = null)
    {
        $this->consultation = $consultation;

        return $this;
    }

    /**
     * Get consultation
     *
     * @return \CSRU\CSRUBundle\Entity\Consultation 
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * Set reservation
     *
     * @param \CSRU\CSRUBundle\Entity\Reservation $reservation
     * @return Patient
     */
    public function setReservation(\CSRU\CSRUBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \CSRU\CSRUBundle\Entity\Reservation 
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Set dossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Patient
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
     * Set carte_AMV
     *
     * @param \CSRU\CSRUBundle\Entity\Carte_AMV $carteAMV
     * @return Patient
     */
    public function setCarteAMV(\CSRU\CSRUBundle\Entity\Carte_AMV $carteAMV = null)
    {
        $this->carte_AMV = $carteAMV;

        return $this;
    }

    /**
     * Get carte_AMV
     *
     * @return \CSRU\CSRUBundle\Entity\Carte_AMV 
     */
    public function getCarteAMV()
    {
        return $this->carte_AMV;
    }
}
