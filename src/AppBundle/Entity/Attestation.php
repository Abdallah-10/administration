<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attestation
 *
 * @ORM\Table(name="attestation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttestationRepository")
 */
class Attestation
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
     * @ORM\Column(name="typer", type="string", length=255)
     */
    private $typer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="datetime")
     */
    private $dateEnvoi;

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
     * @var int
     *
     * @ORM\Column(name="isNoted", type="integer")
     */
    private $isNoted=0;

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
     * @return Attestation
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
     * @return Attestation
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
     * Set typer
     *
     * @param string $typer
     *
     * @return Attestation
     */
    public function setTyper($typer)
    {
        $this->typer = $typer;

        return $this;
    }

    /**
     * Get typer
     *
     * @return string
     */
    public function getTyper()
    {
        return $this->typer;
    }

    /**
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     *
     * @return Attestation
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Attestation
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
     * @return Attestation
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
     * @return Attestation
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

