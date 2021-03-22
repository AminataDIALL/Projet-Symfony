<?php

namespace CSRU\CSRUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;
    
     /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=100, nullable=false)
     */
    private $genre;
    /**
     * @var string
     *
     * @ORM\Column(name="lieuDeNaissance", type="string", length=100, nullable=false)
     */
    
    private $lieuDeNaissance;
    /**
     * @var string
     *
     * @ORM\Column(name="universite", type="string", length=100, nullable=false)
     */
    private $universite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="faculte", type="string", length=100, nullable=false)
     */
    private $faculte;
    
     /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=100, nullable=false)
     */
    private $matricule;
    
      /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", length=20, nullable=false)
     */
    private $age;
   

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
     * Set prenom
     *
     * @param string $prenom
     * @return Etudiant
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
     * Set genre
     *
     * @param string $genre
     * @return Etudiant
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Etudiant
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
     * Set age
     *
     * @param \DateTime $age
     * @return Etudiant
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set lieuDeNaissance
     *
     * @param string $lieuDeNaissance
     * @return Etudiant
     */
    public function setLieuDeNaissance($lieuDeNaissance)
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    /**
     * Get lieuDeNaissance
     *
     * @return string 
     */
    public function getLieuDeNaissance()
    {
        return $this->lieuDeNaissance;
    }

    /**
     * Set universite
     *
     * @param string $universite
     * @return Etudiant
     */
    public function setUniversite($universite)
    {
        $this->universite = $universite;

        return $this;
    }

    /**
     * Get universite
     *
     * @return string 
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * Set faculte
     *
     * @param string $faculte
     * @return Etudiant
     */
    public function setFaculte($faculte)
    {
        $this->faculte = $faculte;

        return $this;
    }

    /**
     * Get faculte
     *
     * @return string 
     */
    public function getFaculte()
    {
        return $this->faculte;
    }

}
