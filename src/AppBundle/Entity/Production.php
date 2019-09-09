<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users;
use AppBundle\Entity\Tache;
use AppBundle\Entity\Clients;
/**
 * Production
 *
 * @ORM\Table(name="production")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductionRepository")
 */
class Production
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_prod", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_prod;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
     
    private $users;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_tache", type="datetime")
     */
    private $dateTache;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Tache")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tache;
 
    /**
     * @var string
     *
     * @ORM\Column(name="commande", type="string", length=255)
     */
    private $commande;

    /**
     * @var string
     *
     * @ORM\Column(name="superviseur", type="string", length=255)
     */
    private $superviseur;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="time", nullable=true)
     */
    private $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin",type="time", nullable=true)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="estime", type="string", length=255)
     */
    private $estime;

    /**
     * @var string
     *
     * @ORM\Column(name="temps_passe", type="string", length=255)
     */
    private $tempsPasse;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_now", type="datetime")
     */
    private $dateNow;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clients;


    /**
     * Get id_prod
     *
     * @return int
     */
    public function getId_prod()
    {
        return $this->id_prod;
    }

   /**
     * Set users
     *
     * @param AppBundle\Entity\Users $users
     *
     * @return Production
     */
    public function setUsers(Users $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return AppBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set dateTache
     *
     * @param \DateTime $dateTache
     *
     * @return Production
     */
    public function setDateTache($dateTache)
    {
        $this->dateTache = $dateTache;

        return $this;
    }

    /**
     * Get dateTache
     *
     * @return \DateTime
     */
    public function getDateTache()
    {
        return $this->dateTache;
    }

    /**
     * Set tache
     *
     * @param AppBundle\Entity\Tache $tache
     *
     * @return Production
     */
    public function setTache($tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return AppBundle\Entity\Tache
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set commande
     *
     * @param string $commande
     *
     * @return Production
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return string
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set superviseur
     *
     * @param AppBundle\Entity\Users $users
     *
     * @return Production
     */
    public function setSuperviseur($superviseur=[])
    {
        $this->superviseur = $superviseur->getNom() .' '. $superviseur->getPrenom();
        return $this;
    }
    /**
     * Get superviseur
     *
     * @return AppBundle\Entity\Users
     */
    public function getSuperviseur()
    {
        return $this->superviseur;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Production
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Production
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
     * @return Production
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
     * Set estime
     *
     * @param \DateTime $estime
     *
     * @return Production
     */
    public function setEstime($estime)
    {
        $this->estime = $estime;

        return $this;
    }

    /**
     * Get estime
     *
     * @return \DateTime
     */
    public function getEstime()
    {
        return $this->estime;
    }

    /**
     * Set tempsPasse
     *
     * @param string $tempsPasse
     *
     * @return Production
     */
    public function setTempsPasse($tempsPasse)
    {
        $this->tempsPasse = $tempsPasse;

        return $this;
    }

    /**
     * Get tempsPasse
     *
     * @return string
     */
    public function getTempsPasse()
    {
        return $this->tempsPasse;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Production
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
     * Set dateNow
     *
     * @param \DateTime $dateNow
     *
     * @return Production
     */
    public function setDateNow($dateNow)
    {
        $this->dateNow = $dateNow;

        return $this;
    }

    /**
     * Get dateNow
     *
     * @return \DateTime
     */
    public function getDateNow()
    {
        return $this->dateNow;
    }

    /**
     * Set clients
     *
     * @param AppBundle\Entity\Clients $clients
     *
     * @return Production
     */
    public function setClients($clients)
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * Get clients
     *
     * @return AppBundle\Entity\Clients
     */
    public function getClients()
    {
        return $this->clients;
    }

}

