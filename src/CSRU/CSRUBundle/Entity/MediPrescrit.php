<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *MediPrescrit
 *
 * @ORM\Table(name="mediPrescrit")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\MediPrescritRepository")
 */
class MediPrescrit
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\Prescription",mappedBy="mediPrescrit",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $prescription;
    
    
     /**
     * @var string
     *
     * @ORM\Column(name="nomMedicament", type="string", length=100, nullable=true)
     */
    private $nomMedicament;
    
     /**
     * @var string
     *
     * @ORM\Column(name="quantiteMedicament", type="string", length=100, nullable=true)
     */
    private $quantiteMedicament;
    
     /**
     * @var string
     *
     * @ORM\Column(name="nbreMedicament", type="string", length=100, nullable=true)
     */
    private $nbreMedicament;
    

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
     * Set nomMedicament
     *
     * @param string $nomMedicament
     * @return MediPrescrit
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
     * Set quantiteMedicament
     *
     * @param string $quantiteMedicament
     * @return MediPrescrit
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
     * Set nbreMedicament
     *
     * @param string $nbreMedicament
     * @return MediPrescrit
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
     * @return MediPrescrit
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
}
