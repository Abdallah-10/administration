<?php

namespace PlaningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="PlaningBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="livrable", type="string", length=255)
     */
    private $livrable;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=255)
     */
    private $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="dpi", type="string", length=255)
     */
    private $dpi;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=255)
     */
    private $profil;

     /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", length=25)
     */
    private $quantite;

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

     /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Product
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

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
     * @return Product
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
     * Set livrable
     *
     * @param string $livrable
     *
     * @return Product
     */
    public function setLivrable($livrable)
    {
        $this->livrable = $livrable;

        return $this;
    }

    /**
     * Get livrable
     *
     * @return string
     */
    public function getLivrable()
    {
        return $this->livrable;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Product
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set resolution
     *
     * @param string $resolution
     *
     * @return Product
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return string
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set dpi
     *
     * @param string $dpi
     *
     * @return Product
     */
    public function setDpi($dpi)
    {
        $this->dpi = $dpi;

        return $this;
    }

    /**
     * Get dpi
     *
     * @return string
     */
    public function getDpi()
    {
        return $this->dpi;
    }

    /**
     * Set profil
     *
     * @param string $profil
     *
     * @return Product
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }
}

