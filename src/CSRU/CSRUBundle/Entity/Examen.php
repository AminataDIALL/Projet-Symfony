<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examen
 *
 * @ORM\Table(name="examen")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\ExamenRepository")
 */
class Examen {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="examen")
     * @ORM\JoinColumn(nullable=true)
     */
    private $DossierMedical;

    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="examen")
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
     * @ORM\Column(name="taille", type="string", length=100, nullable=true)
     */
    private $taille;
    
     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=true)
     */
    private $type;

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
     * @ORM\Column(name="resultat", type="string", length=100, nullable=false)
     */
    private $resultat;
    
     /**
     * @var string
     *
     * @ORM\Column(name="groupe_saguin", type="string", length=100, nullable=true)
     */
    private $groupe_saguin;
    
   

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
     * @return Examen
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
     * Set taille
     *
     * @param string $taille
     * @return Examen
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
     * @return Examen
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
     * @return Examen
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
     * @return Examen
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
     * Set resultat
     *
     * @param string $resultat
     * @return Examen
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

    /**
     * Set groupe_saguin
     *
     * @param string $groupeSaguin
     * @return Examen
     */
    public function setGroupeSaguin($groupeSaguin)
    {
        $this->groupe_saguin = $groupeSaguin;

        return $this;
    }

    /**
     * Get groupe_saguin
     *
     * @return string 
     */
    public function getGroupeSaguin()
    {
        return $this->groupe_saguin;
    }

    /**
     * Set DossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Examen
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
     * @return Examen
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
     * Set type
     *
     * @param string $type
     * @return Examen
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
}
