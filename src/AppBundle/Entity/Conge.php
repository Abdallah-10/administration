<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conge
 *
 * @ORM\Table(name="conge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CongeRepository")
 */
class Conge
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
     * @var float
     *
     * @ORM\Column(name="jours", type="float")
     */
    private $jours;

    /**
     * @var string
     *
     * @ORM\Column(name="type_cong", type="string", length=255)
     */
    private $typeCong;

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
     * @ORM\Column(name="certif", type="string", length=255)
     */
    private $certif;

      /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

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
     * @var string
     *
     * @ORM\Column(name="manager", type="string", length=255)
     */
     private $manager;
    /**
     * @var int
     *
     * @ORM\Column(name="isNoted", type="integer")
     */
    private $isNoted=0;

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
      * Set manager
      *
      * @param string $manager
      *
      * @return Conge
      */
     public function setManager($manager)
     {
         $this->manager = $manager;

         return $this;
     }

     /**
      * Set dateAccept
      *
      * @param \Date $dateAccept
      *
      * @return Conge
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
     * @return Conge
     */
    public function setPrint($print)
    {
        $this->print = $print;

        return $this;
    }

      /**
     * Get certif
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Get certif
     *
     * @return int
     */
    public function getCertif()
    {
        return $this->certif;
    }

    /**
     * Set certif
     *
     * @param string $certif
     *
     * @return Conge
     */
    public function setCertif($certif)
    {
        $this->certif = $certif;

        return $this;
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
     * @return Conge
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
     * @return Conge
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
     * Set jours
     *
     * @param float $jours
     *
     * @return Conge
     */
    public function setJours($jours)
    {
        $this->jours = $jours;

        return $this;
    }

    /**
     * Get jours
     *
     * @return float
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * Set typeCong
     *
     * @param string $typeCong
     *
     * @return Conge
     */
    public function setTypeCong($typeCong)
    {
        $this->typeCong = $typeCong;

        return $this;
    }

    /**
     * Get typeCong
     *
     * @return string
     */
    public function getTypeCong()
    {
        return $this->typeCong;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Conge
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
     * @return Conge
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
     * @return Conge
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
     * @return Conge
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
     * @return Conge
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
