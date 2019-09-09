<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autorisation
 *
 * @ORM\Table(name="autorisation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AutorisationRepository")
 */
class Autorisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="hours", type="integer")
     */
    private $hours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="retour", type="integer")
     */
    private $retour;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

	    /**
     * @var string
     *
     * @ORM\Column(name="manager", type="string", length=255)
     */
    private $manager;


    /**
     * @var int
     *
     * @ORM\Column(name="print", type="integer")
     */
    private $print;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_accept", type="string", length=255)
     */
    private $dateAccept;

    /**
     * @var int
     *
     * @ORM\Column(name="isNoted", type="integer")
     */
    private $isNoted=0;

    /**
     * Set dateAccept
     *
     * @param \Date $dateAccept
     *
     * @return Autorisation
     */
    public function setDateAccept($dateAccept)
    {
        $this->dateAccept = $dateAccept;

        return $this;
    }

    /**
     * Get dateAccept
     *
     * @return \DateTime
     */
    public function getDateAccept()
    {
        return $this->dateAccept;
    }

    /**
    * Get print
    *
    * @return int
    */
    public function getPrint()
    {
       return $this->print;
    }

    /**
    * Set print
    *
    * @param string $print
    *
    * @return Autorisation
    */
    public function setPrint($print)
    {
       $this->print = $print;

       return $this;
    }
      /**
     * @var string
     *
     * @ORM\Column(name="accepteur", type="string", length=255)
     */
     private $accepteur;

     /**
      * Get accepteur
      *
      * @return string
      */
     public function getAccepteur()
     {
         return $this->accepteur;
     }

     /**
      * Set accepteur
      *
      * @param string $accepteur
      *
      * @return Autorisation
      */
     public function setAccepteur($accepteur)
     {
         $this->accepteur = $accepteur;

         return $this;
     }

     /**
     * Get manager
     *
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Autorisation
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
     *
     * @return Autorisation
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
     * Set hours
     *
     * @param integer $hours
     *
     * @return Autorisation
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return int
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Autorisation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Autorisation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Autorisation
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
     /**
     * Set retour
     *
     * @param integer $retour
     *
     * @return Autorisation
     */
    public function setRetour($retour)
    {
        $this->retour = $retour;

        return $this;
    }

    /**
     * Get retour
     *
     * @return int
     */
    public function getRetour()
    {
        return $this->retour;
    }


    /**
     * Set isNoted
     *
     * @param integer $isNoted
     *
     * @return Autorisation
     */
    public function setIsNoted($isNoted)
    {
        $this->isNoted = $isNoted;

        return $this;
    }

    /**
     * Get isNoted
     *
     * @return int
     */
    public function getIsNoted()
    {
        return $this->retour;
    }
}
