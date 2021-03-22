<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *FicheSortie
 *
 * @ORM\Table(name="ficheSortie")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\FicheSortieRepository")
 */
class FicheSortie
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    
    /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Hospitalisation",
     * cascade={"persist", "remove"})
     */
    private $hospitalisation;
    
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="datetime", nullable=false)
     */
    private $dateSortie;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;
    
    /**
     * @var string
     *
     * @ORM\Column(name="bilan", type="string", nullable=true)
     */
    private $bilan;
    
    /**
     * @var string
     *
     * @ORM\Column(name="regimeSuivi", type="string", nullable=true)
     */
    private $regimeSuivi;
    

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
     * Set duree
     *
     * @param integer $duree
     * @return FicheSortie
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set hospitalisation
     *
     * @param \CSRU\CSRUBundle\Entity\Hospitalisation $hospitalisation
     * @return FicheSortie
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
     * Set bilan
     *
     * @param string $bilan
     * @return FicheSortie
     */
    public function setBilan($bilan)
    {
        $this->bilan = $bilan;

        return $this;
    }

    /**
     * Get bilan
     *
     * @return string 
     */
    public function getBilan()
    {
        return $this->bilan;
    }

    /**
     * Set regimeSuivi
     *
     * @param string $regimeSuivi
     * @return FicheSortie
     */
    public function setRegimeSuivi($regimeSuivi)
    {
        $this->regimeSuivi = $regimeSuivi;

        return $this;
    }

    /**
     * Get regimeSuivi
     *
     * @return string 
     */
    public function getRegimeSuivi()
    {
        return $this->regimeSuivi;
    }

    /**
     * Set dateSortie
     *
     * @param \DateTime $dateSortie
     * @return FicheSortie
     */
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get dateSortie
     *
     * @return \DateTime 
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }
}
