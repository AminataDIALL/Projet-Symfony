<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\RdvRepository")
 */
class Rdv
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",inversedBy="rdv")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dossierMedical;
    
     /**
     * @ORM\ManyToOne(targetEntity="CSRU\CSRUBundle\Entity\Utilisateur",inversedBy="rdv")
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
     * @ORM\Column(name="motif", type="string", length=100, nullable=false)
     */
    private $motif;
    
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
     * @return Rdv
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
     * Set motif
     *
     * @param string $motif
     * @return Rdv
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
     * Set dossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Rdv
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
     * @return Rdv
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
