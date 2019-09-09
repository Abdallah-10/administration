<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frais
 *
 * @ORM\Table(name="frais")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FraisRepository")
 */
class Frais
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
     * @var string
     *
     * @ORM\Column(name="type_depense", type="string", length=255)
     */
    private $typeDepense;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="ttc", type="float")
     */
    private $ttc;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float")
     */
    private $tva;

    /**
     * @var float
     *
     * @ORM\Column(name="net", type="float")
     */
    private $net;

    /**
     * @var int
     *
     * @ORM\Column(name="notif", type="integer")
     */
    private $notif;

    /**
     * @var string
     *
     * @ORM\Column(name="certif", type="string", length=255)
     */
    private $certif;

    /**
     * @var int
     *
     * @ORM\Column(name="retour", type="integer")
     */
    private $retour;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     */
    private $site;

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Frais
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * @return Frais
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
     * @return Frais
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
     * Set typeDepense
     *
     * @param string $typeDepense
     *
     * @return Frais
     */
    public function setTypeDepense($typeDepense)
    {
        $this->typeDepense = $typeDepense;

        return $this;
    }

    /**
     * Get typeDepense
     *
     * @return string
     */
    public function getTypeDepense()
    {
        return $this->typeDepense;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Frais
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
     * Set ttc
     *
     * @param float $ttc
     *
     * @return Frais
     */
    public function setTtc($ttc)
    {
        $this->ttc = $ttc;

        return $this;
    }

    /**
     * Get ttc
     *
     * @return float
     */
    public function getTtc()
    {
        return $this->ttc;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Frais
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set net
     *
     * @param float $net
     *
     * @return Frais
     */
    public function setNet($net)
    {
        $this->net = $net;

        return $this;
    }

    /**
     * Get net
     *
     * @return float
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * Set notif
     *
     * @param integer $notif
     *
     * @return Frais
     */
    public function setNotif($notif)
    {
        $this->notif = $notif;

        return $this;
    }

    /**
     * Get notif
     *
     * @return int
     */
    public function getNotif()
    {
        return $this->notif;
    }

    /**
     * Set certif
     *
     * @param string $certif
     *
     * @return Frais
     */
    public function setCertif($certif)
    {
        $this->certif = $certif;

        return $this;
    }

    /**
     * Get certif
     *
     * @return string
     */
    public function getCertif()
    {
        return $this->certif;
    }

    /**
     * Set retour
     *
     * @param integer $retour
     *
     * @return Frais
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
}

