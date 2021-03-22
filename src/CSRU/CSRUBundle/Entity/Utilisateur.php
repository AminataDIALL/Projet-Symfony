<?php   

namespace CSRU\CSRUBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
  * @ORM\Entity(repositoryClass="CSRU\CSRUBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="CSRU\CSRUBundle\Entity\Profil",
     * cascade={"persist", "remove"})
     */
    private $profil;
    
    /**
     * @ORM\OneToMany(targetEntity="CSRU\CSRUBundle\Entity\DossierMedical",mappedBy="utilisateur",
     * cascade={ "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $dossierMedical;
    
    public function __construct()
    {
        parent::__construct();
    }
  
    
   

    /**
     * Set profil
     *
     * @param \CSRU\CSRUBundle\Entity\Profil $profil
     * @return Utilisateur
     */
    public function setProfil(\CSRU\CSRUBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \CSRU\CSRUBundle\Entity\Profil 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Add dossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     * @return Utilisateur
     */
    public function addDossierMedical(\CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical)
    {
        $this->dossierMedical[] = $dossierMedical;

        return $this;
    }

    /**
     * Remove dossierMedical
     *
     * @param \CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical
     */
    public function removeDossierMedical(\CSRU\CSRUBundle\Entity\DossierMedical $dossierMedical)
    {
        $this->dossierMedical->removeElement($dossierMedical);
    }

    /**
     * Get dossierMedical
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDossierMedical()
    {
        return $this->dossierMedical;
    }
}
